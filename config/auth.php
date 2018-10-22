<?php

return [

    /*
     * -------------------------------------------------------------------
     *  Auth variables
     * -------------------------------------------------------------------
     *
     */

    'auth' => [
        'account' => [
            'activation' => false, // does new account need activation
            'lock_after' => 5, // number of unsuccessful attempts before account is locked
            'lock_for' => 30 * 60, // number of seconds before account is unlocked (30 minutes)
            'password_expires' => false, // does the user need to change the password
            'password_expires_after' => 30 // number of days before the password needs to be changed
        ],
        'token_id' => 'auth_token',

        /*
         * -------------------------------------------------------------------
         *  Guards
         * -------------------------------------------------------------------
         * Guards are used to configure the auth manager to use different
         * users' provider
         *
         * Pay attention to the first guard as it is going to be used
         * as the default one if no one is provided in the manager
         * instantiation.
         *
         */
        'guards' => [
            'web' => [
                'provider' => \moharram82\Auth\DatabaseUserProvider::class,
            ],
        ],
        'send_activation' => 'send-activation.php',
        'reset_password' => 'reset-password.php',
        'login_path' => '/login.php',
        'logout_path' => '/logout.php',
        'register_path' => '/register.php',
        'profile_path' => '/profile.php',

        /*
         * -------------------------------------------------------------------
         *  Remember me
         * -------------------------------------------------------------------
         *
         */
        'remember_me' => [
            'secret' => 'freelancerhub_remember_me_secret',
            'field' => '_remember_me',
            'cookie' => [
                'name' => 'rememberme',
                'lifetime' => 31536000, // 1 year
                'encrypt' => true,
            ],
            'token_id' => 'remember_me_token',
        ],
    ],
];
