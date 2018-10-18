<?php

namespace moharram82\Auth;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;

class User implements AdvancedUserInterface
{
    private $user_id;
    private $username;
    private $password;
    private $enabled;
    private $accountNonExpired = true;
    private $credentialsNonExpired;
    private $accountNonLocked;
    private $lockedOn;
    private $roles;
    private $attempts;
    private $last_attempt_on;
    private $last_attempt_ip;
    private $last_attempt_useragent;

    public function __construct(
        $user_id,
        $username,
        $password,
        $roles = '',
        $enabled = 1,
        $credentialsLastUpdated = 1,
        $accountLocked = 1,
        $lockedOn = 0,
        $attempts = 0,
        $last_attempt_Time = 0,
        $last_attempt_ip = null,
        $last_attempt_useragent = null
    )
    {
        if ('' === $username || null === $username) {
            throw new \InvalidArgumentException('The username cannot be empty.');
        }

        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
        $this->enabled = $this->isAccountActivated($enabled);
        $this->credentialsNonExpired = $this->checkCredentialsLifetime($credentialsLastUpdated);
        $this->accountNonLocked = $accountLocked ? false : true;
        $this->lockedOn = $lockedOn;
        $this->attempts = $attempts;
        $this->last_attempt_on = $last_attempt_Time;
        $this->last_attempt_ip = $last_attempt_ip;
        $this->last_attempt_useragent = $last_attempt_useragent;
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return explode(",", $this->roles);
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonExpired()
    {
        return $this->accountNonExpired;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccountNonLocked()
    {
        return $this->accountNonLocked;
    }

    /**
     * {@inheritdoc}
     */
    public function isCredentialsNonExpired()
    {
        return $this->credentialsNonExpired;
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        $this->password = null;
    }

    private function checkCredentialsLifetime(int $credentialsLastUpdated)
    {
        if(config('auth.account.password_expires')) {

            $maxLifetime = config('auth.account.password_expires_after') * 24 * 60 * 60; // in seconds

            return $maxLifetime + $credentialsLastUpdated > time();
        }

        return true;
    }

    private function isAccountActivated(int $enabled)
    {
        if(config('auth.account.activation')) {
            return $enabled ? true : false;
        }

        return true;
    }

    /**
     * get the login attempts
     *
     * @return int
     */
    public function getAttempts(): int
    {
        return $this->attempts;
    }

    /**
     * get the last attempt time
     *
     * @return int
     */
    public function getLastAttemptOn(): int
    {
        return $this->last_attempt_on;
    }

    /**
     * get the last attempt ip address
     *
     * @return null
     */
    public function getLastAttemptIp()
    {
        return $this->last_attempt_ip;
    }

    /**
     * get the last attempt user agent string
     *
     * @return null
     */
    public function getLastAttemptUseragent()
    {
        return $this->last_attempt_useragent;
    }

    /**
     * get the time when the account locked
     *
     * @return int
     */
    public function getLockedOn(): int
    {
        return $this->lockedOn;
    }
}
