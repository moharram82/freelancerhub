<?php

namespace moharram82\Auth;

use Symfony\Component\Security\Core\User\UserInterface;

class User3 implements UserInterface
{
    private $username;
    private $password;
    private $roles;
    private $user_id;

    public function __construct(string $username, string $password, string $roles, int $user_id)
    {
        if (empty($username))
        {
            throw new \InvalidArgumentException('No username provided.');
        }

        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
        $this->user_id = $user_id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return explode(",", $this->roles);
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getSalt()
    {
        return '';
    }

    public function eraseCredentials() {
        $this->password = null;
    }
}