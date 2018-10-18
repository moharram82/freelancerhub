<?php

namespace moharram82\Auth;

use App\models\User as UserModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class DatabaseUserProvider implements UserProviderInterface
{
    private $usersTbl = UserModel::class;
    const ID_COL = 'user_id';
    const USERNAME_COL = 'username';
    const PASSWORD_COL = 'password';
    const ROLES_COL = 'roles';
    const ACTIVE_COL = 'is_activated';
    const LOCKED_COL = 'is_locked';
    const LOCKED_ON_COL = 'locked_on';
    const ATTEMPTS_COL = 'login_attempts';
    const LAST_ATTEMPT_ON_COL = 'last_attempt_time';
    const LAST_ATTEMPT_IP_COL = 'last_attempt_ip';
    const LAST_ATTEMPT_USERAGENT_COL = 'last_attempt_useragent';
    const CREDENTIALS_LAST_UPDATED_ON_COL = 'credentials_last_updated';

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function loadUserByUsername($username)
    {
        return $this->getUser($username);
    }

    private function getUser($username)
    {

        //$user = UserModel::where(self::USERNAME_COL, $username)->first();
        $user = $this->usersTbl::where(self::USERNAME_COL, $username)->first();

        if (! $user)
        {
            $exception = new UsernameNotFoundException(sprintf('Username "%s" not found in the database.', $username));
            $exception->setUsername($username);
            throw $exception;
        }
        else
        {
            return new User(
                $user->{self::ID_COL},
                $user->{self::USERNAME_COL},
                $user->{self::PASSWORD_COL},
                $user->{self::ROLES_COL},
                $user->{self::ACTIVE_COL},
                $user->{self::CREDENTIALS_LAST_UPDATED_ON_COL},
                $user->{self::LOCKED_COL},
                $user->{self::LOCKED_ON_COL},
                $user->{self::ATTEMPTS_COL},
                $user->{self::LAST_ATTEMPT_ON_COL},
                $user->{self::LAST_ATTEMPT_IP_COL},
                $user->{self::LAST_ATTEMPT_USERAGENT_COL}
            );
        }
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User)
        {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->getUser($user->getUsername());
    }

    public function supportsClass($class)
    {
        return 'App\Auth\User' === $class;
    }

    public function userExists($username) {
        return $this->usersTbl::where(self::USERNAME_COL, $username)->first() ? true : false;
    }

    public function increaseAttempts($username, $increase_by)
    {
        $user = $this->usersTbl::where(self::USERNAME_COL, $username)->first();

        $user->{self::ATTEMPTS_COL} = $user->{self::ATTEMPTS_COL} + $increase_by;
        $user->{self::LAST_ATTEMPT_ON_COL} = time();
        $user->{self::LAST_ATTEMPT_IP_COL} = $this->request->getClientIp();
        $user->{self::LAST_ATTEMPT_USERAGENT_COL} = $this->request->headers->get('User-Agent');
        $user->save();
    }

    public function clearAttempts($username)
    {
        $user = $this->usersTbl::where(self::USERNAME_COL, $username)->first();

        $user->{self::ATTEMPTS_COL} = 0;
        $user->{self::LAST_ATTEMPT_ON_COL} = 0;
        $user->{self::LAST_ATTEMPT_IP_COL} = null;
        $user->{self::LAST_ATTEMPT_USERAGENT_COL} = null;
        $user->save();
    }

    public function lockAccount($username)
    {
        $user = $this->usersTbl::where(self::USERNAME_COL, $username)->first();

        if(0 === $user->{self::LOCKED_COL}) {
            $user->{self::LOCKED_COL} = 1;
            $user->{self::LOCKED_ON_COL} = time();
            $user->save();
        }
    }

    public function unLockAccount($username)
    {
        $user = $this->usersTbl::where(self::USERNAME_COL, $username)->first();

        $user->{self::LOCKED_COL} = 0;
        $user->{self::LOCKED_ON_COL} = 0;
        $user->save();
    }
}