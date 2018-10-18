<?php

namespace moharram82\Auth;

use Illuminate\Encryption\Encrypter;
use moharram82\Auth\Exception\ProviderKeyNotFoundException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\RememberMeToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManager;
use Symfony\Component\Security\Core\Authorization\Voter\RoleVoter;
use Symfony\Component\Security\Core\Exception\CredentialsExpiredException;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\Exception\LockedException;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;

class Auth
{
    private $session;
    private $request;
    private $pdo;
    private $authenticationManager;
    private $authorizationChecker;
    private $accessDecisionManager;
    private $dbAuthenticationProvider;
    private $tokenStorage;
    private $userProvider;
    private $providerKey;
    private $userChecker;
    private $trustResolver;
    private $voters = [];
    private $errors = [];
    private $encrypter;

    public function __construct(SessionInterface $session, Request $request, $providerKey = null, \PDO $pdo = null)
    {
        $this->session = $session;

        $this->request = $request;

        $this->setProviderKey($providerKey);

        if(null === $pdo || ! $pdo instanceof \PDO) {
            $this->pdo = pdoMysqlConnect(config('db.host'), config('db.username'), config('db.password'), config('db.name'));
        } else {
            $this->pdo = $pdo;
        }

        $this->init();
    }

    public function guard($providerKey = null)
    {
        $this->setProviderKey($providerKey);
        $this->init();

        return $this;
    }

    private function init()
    {
        $userProviderClass = config('auth.guards.' . $this->providerKey . '.provider');

        $this->userProvider = new $userProviderClass($this->request);

        $this->userChecker = new UserChecker();

        $this->dbAuthenticationProvider = new DatabaseAuthenticationProvider($this->userProvider, $this->userChecker, $this->providerKey);

        $this->authenticationManager = new AuthenticationProviderManager([$this->dbAuthenticationProvider], true);

        if($this->session->has(config('auth.token_id'))) {
            $this->tokenStorage = $this->session->get(config('auth.token_id'));
        } else {
            $this->tokenStorage = new TokenStorage();
        }

        // We only create a single voter that checks on given token roles.
        $this->voters = array(
            new RoleVoter('ROLE_'),
        );

        // Tie all voters into the access decision manager
        $this->accessDecisionManager = new AccessDecisionManager(
            $this->voters,
            AccessDecisionManager::STRATEGY_AFFIRMATIVE,
            false,
            true
        );

        $this->authorizationChecker = new AuthorizationChecker(
            $this->tokenStorage,
            $this->authenticationManager,
            $this->accessDecisionManager,
            false
        );

        $this->trustResolver = new AuthenticationTrustResolver(AnonymousToken::class, RememberMeToken::class);

        $this->encrypter = new Encrypter(config('encryption_key'));
    }

    private function setProviderKey($providerKey)
    {
        // fetch guards from the configuration file
        $guards = config('auth.guards');

        // check if there is guards in the config file
        if(null === $guards || ! is_array($guards)) {
            throw new ProviderKeyNotFoundException('No guards found in the configuration file!');
        }

        // if no guard was passed then use the first one in the configuration file as the default
        if(null === $providerKey) {
            $this->providerKey = key($guards);

            return;
        }

        // check if the provided guard exists in the configuration file
        if(! in_array($providerKey, array_keys($guards))) {
            throw new ProviderKeyNotFoundException('Unknown provider key: "' . $providerKey . '", make sure you have
             configured your guards correctly in the configuration file."');
        } else {
            $this->providerKey = $providerKey;
            return;
        }
    }

    // Get the currently authenticated user's ID...
    public function id()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            return $token->getUser()->getUserId();
        }

        return null;
    }

    // Get the currently authenticated user's username...
    public function username()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            return $token->getUsername();
        }

        return null;
    }

    // Get the currently authenticated user's roles...
    public function roles()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            //$this->refreshToken();

            return $token->getUser()->getRoles();
        }

        return null;
    }

    // Get the currently authenticated user...
    public function user()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            //$this->refreshToken();

            return $token->getUser();
        }

        return null;
    }

    // get the login attempts
    public function loginAttempts()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            //$this->refreshToken();

            return $token->getUser()->getAttempts();
        }

        return null;
    }

    // get the last attempt time
    public function lastAttemptOn()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            //$this->refreshToken();

            return $token->getUser()->getLastAttemptOn();
        }

        return null;
    }

    // get the last attempt ip address
    public function lastAttemptIp()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            //$this->refreshToken();

            return $token->getUser()->getLastAttemptIp();
        }

        return null;
    }

    // determining If The Current User Is Authenticated
    public function check()
    {
        if (null !== $token = $this->tokenStorage->getToken()) {
            return $token->isAuthenticated();
        }

        return false;
    }

    // attempt to authenticate te user
    public function attempt($username, $password, array $roles = array())
    {
        // do not attempt login if account is locked and still during ban period
        try {
            // get the attempting user:
            $user = $this->userProvider->loadUserByUsername($username);

            if($user) {
                $not_locked = $user->isAccountNonLocked();

                // unlock the account if the ban period is over
                if(! $not_locked && $this->isLockOver($user->getLockedOn())) {
                    $this->unLockAccount($username);
                    $this->resetAttempts($username);
                }
            }

        } catch (AuthenticationException $e) {
            $user = null;
            $not_locked = false;
        }


        $unauthenticatedToken = $this->getUnAuthenticatedToken($username, $password, $this->providerKey, $roles);

        try {

            // create authenticated token & create session data
            $authenticatedToken = $this->authenticationManager->authenticate($unauthenticatedToken);
            $this->tokenStorage->setToken($authenticatedToken);
            $this->session->set(config('auth.token_id'), $this->tokenStorage);

            if ($this->request->request->has(config('auth.remember_me.field'))) {
                // todo:create autologin
                $this->createAutologin();
            }

            // unlock the account if locked after successful login
            if(! $not_locked) {
                $this->unLockAccount($username);
            }

            // reset the attempts after successful login
            $this->resetAttempts($username);

            return true;

        } catch (LockedException $e) {
            $this->errors['attempt'] = 'Your account is locked!<br>
            Probably you have unsuccessfully tried to login more than ' . config('auth.account.lock_after') . ' times<br>
            Wait 30 minutes before you try again.';
        } catch (DisabledException $e) {
            $this->errors['attempt'] = 'Your account is not activated yet!<br>
            Find the activation email and click the activation link to activate your account.<br>
            If you don\'t see the activation email check the spam folder or <a href="' . config('auth.send_activation') . '?' . htmlentities('email=' . urlencode($username)) . '">re-send</a> the email again.';
        } catch (CredentialsExpiredException $e) {
            $this->errors['attempt'] = 'Your password is expired!<br>
            Please <a href="' . config('auth.reset_password') . '?' . htmlentities('email=' . urlencode($username)) . '">reset</a> your password before you can login again.<br>';
        } catch (AuthenticationException $e) {
            $this->errors['attempt'] = $e->getMessage();
        }

        // if attempt fails record a failed attempt
        $this->recordFailedAttempt($username);

        return false;
    }

    private function getAttemptingUser($username) {

        try {
            // get the attempting user:
            $user = $this->userProvider->loadUserByUsername($username);

            if($user) {
                $user->eraseCredentials();

                return $user;
            }
        } catch (AuthenticationException $e) {
            return false;
        }
    }

    private function recordFailedAttempt($username)
    {
        $user = $this->getAttemptingUser($username);

        if($user) {
            // get the attempts count:
            $attempts_count = $user->getAttempts();

            // if attempts counter less than the max limit:
            if ($attempts_count < config('auth.account.lock_after')) {
                // increase the counter by one & record the time & ip of the attempt
                $this->increaseAttempts($username);
            } elseif ($attempts_count >= config('auth.account.lock_after')) {
                // if attempts counter equals or more than the max limit lock the account
                $this->lockAccount($username);
            }
        }
    }

    private function resetAttempts($username) {
        $this->userProvider->clearAttempts($username);
    }

    private function increaseAttempts($username, int $increase_by = 1) {
        $this->userProvider->increaseAttempts($username, $increase_by);
    }

    private function lockAccount($username) {
        $this->userProvider->lockAccount($username);
    }

    private function unLockAccount($username) {
        $this->userProvider->unLockAccount($username);
    }

    private function isLockOver(int $locked_on) {

        $lockDuration = config('auth.account.lock_for');

        if($locked_on > 0) {
            return ($locked_on + $lockDuration) < time();
        }

        return true;
    }

    // check if the user has a specific role
    public function isGranted($roles)
    {
        //$this->refreshToken();

        return $this->authorizationChecker->isGranted($roles);
    }

    // allow only specific users to access the resource
    public function allowOnly($roles)
    {
        if(!$this->check()) {
            redirect(config('auth.login_path'));
        }

        if(!is_array($roles)) {
            $roles = array($roles);
        }

        foreach ($roles as $role) {
            if($this->isGranted($role)) {
                return true;
            }
        }

        return false;
    }

    // attempt to re-authenticate and refresh the token storage
    protected function refreshToken() {
        if (null !== ($token = $this->tokenStorage->getToken())) {
            return $this->attempt(
                $token->getUser()->getUsername(),
                $token->getUser()->getPassword()
            );
        }

        return false;
    }
    
    // log the user out
    public function logout()
    {
        // clear the session
        $this->session->clear();

        // delete the remember_me cookie
        cookie(config('auth.remember_me.cookie.name'), '', -36000);
    }

    protected function getUnAuthenticatedToken($username, $password, $providerKey, array $roles = array())
    {
        try {
            $unauthenticatedToken = new UsernamePasswordToken(
                $username,
                $password,
                $providerKey,
                $roles
            );

            return $unauthenticatedToken;
        } catch (\InvalidArgumentException $e) {
            $this->errors['token'] = $e->getMessage();
        }
    }

    public function isAnonymous(TokenInterface $token = null)
    {
        return $this->trustResolver->isAnonymous($token);
    }

    public function isRememberMe(TokenInterface $token = null)
    {
        return $this->trustResolver->isRememberMe($token);
    }

    public function isFullFledged(TokenInterface $token = null)
    {
        return $this->trustResolver->isFullFledged($token);
    }

    // create an autologin
    private function createAutologin()
    {
        return true;
    }

    // generate an autologin id to be used as primary key for the autologins table
    private function generateAutologinId() {}

    // generate a remember me token to be saved in the remember me cookie
    private function generateRememberMeToken() {}

    // extract the remember me token from the remember me cookie
    private function extractRememberMeToken() {}

    // extract the autologin id from the remember me cookie
    private function extractAutologinId() {}

    // get autologin entry from the database
    private function getAutologin($id) {
        $sql = "SELECT * FROM autologins WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $row = $stmt->fetch();

        if (! $row['id'])
        {
            return false;
        }

        return $row;
    }

    // add autologin entry to the database
    private function addAutologin($data) {}

    // update autologin entry in the database
    private function updateAutologin($data) {}

    // delete autologin entry from the database
    private function removeAutologin($id) {}

    // delete all autologin entries for a specific user from the database
    private function purgeUserAutologins($user_id) {}

    // get the remember me cookie
    private function getRememberMeCookie() {}

    // create a remember me cookie
    private function setRememberMeCookie() {}

    // remove the remember me cookie
    private function clearRememberMeCookie() {}

    public function getErrors($key)
    {
        return $this->errors[$key];
    }
}
