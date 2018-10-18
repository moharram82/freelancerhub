<?php

namespace moharram82\Auth;


use Illuminate\Hashing\BcryptHasher;
use Symfony\Component\Security\Core\Authentication\Provider\UserAuthenticationProvider;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationServiceException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class DatabaseAuthenticationProvider extends UserAuthenticationProvider
{
    private $userProvider;

    public function __construct(UserProviderInterface $userProvider, UserCheckerInterface $userChecker, string $providerKey, bool $hideUserNotFoundExceptions = true)
    {
        parent::__construct($userChecker, $providerKey, $hideUserNotFoundExceptions);

        $this->userProvider = $userProvider;
    }

    protected function retrieveUser($username, UsernamePasswordToken $token)
    {
        $user = $token->getUser();

        if ($user instanceof UserInterface)
        {
            return $user;
        }

        try {
            $user = $this->userProvider->loadUserByUsername($username);

            if (!$user instanceof UserInterface)
            {
                throw new AuthenticationServiceException('The user provider must return a UserInterface object.');
            }

            return $user;
        } catch (UsernameNotFoundException $e) {
            $e->setUsername($username);

            throw $e;
        } catch (\Exception $e) {
            $e = new AuthenticationServiceException($e->getMessage(), 0, $e);
            $e->setToken($token);
            throw $e;
        }
    }

    protected function checkAuthentication(UserInterface $user, UsernamePasswordToken $token)
    {
        $hasher = new BcryptHasher();

        $currentUser = $token->getUser();

        if ($currentUser instanceof UserInterface)
        {
            if (! $hasher->check($currentUser->getPassword(), $user->getPassword()))
            {
                throw new AuthenticationException('Credentials were changed from another session.');
            }
        }
        else
        {
            $password = $token->getCredentials();

            if (empty($password))
            {
                throw new AuthenticationException('Password can not be empty.');
            }

            if (! $hasher->check($password, $user->getPassword()))
            {
                throw new AuthenticationException('Password is invalid.');
            }
        }
    }
}