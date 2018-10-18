<?php

return [

    'session' => [

        /*
        |--------------------------------------------------------------------------
        | Default Session Driver
        |--------------------------------------------------------------------------
        |
        | This option controls the default session "driver" that will be used on
        | requests. By default, we will use the lightweight native driver but
        | you may specify any of the other wonderful drivers provided here.
        |
        | Supported: "file", "database"
        |
        */

        'driver' => env('SESSION_DRIVER', 'file'),

        /*
        |--------------------------------------------------------------------------
        | Session Encryption
        |--------------------------------------------------------------------------
        |
        | This option allows you to easily specify that all of your session data
        | should be encrypted before it is stored. All encryption will be run
        | automatically by Laravel and you can use the Session like normal.
        |
        */

        'encrypt' => true,

        /*
        |--------------------------------------------------------------------------
        | Session File Location
        |--------------------------------------------------------------------------
        |
        | When using the native session driver, we need a location where session
        | files may be stored. A default has been set for you but a different
        | location may be specified. This is only needed for file sessions.
        |
        */

        'files' => env('SESSION_PATH', __DIR__ . '/storage/sessions'),

        /*
        |--------------------------------------------------------------------------
        | Session Database Table
        |--------------------------------------------------------------------------
        |
        | When using the "database" session driver, you may specify the table we
        | should use to manage the sessions. Of course, a sensible default is
        | provided for you; however, you are free to change this as needed.
        |
        */

        'table' => env('SESSION_TABLE', 'sessions'),

        /*
        |--------------------------------------------------------------------------
        | Other Session Options
        |--------------------------------------------------------------------------
        |
        */

        'cookie_domain' => "",
        'cookie_httponly' => true,
        'cookie_lifetime' => 0, // in seconds, 0 means until the browser is closed.
        'cookie_path' => "/",
        'cookie_secure' => false,
        'gc_divisor' => 100,
        'gc_maxlifetime' => 1440, // in seconds
        'gc_probability' => 25,
        'name' => env('SESSION_NAME', 'PHPSESSID'),
        'use_strict_mode' => true,
        'use_cookies' => true,
        'use_only_cookies' => true,
        'use_trans_sid' => 0,
        //'cache_limiter' => "nocache",
        //'cache_expire' => "0",
        //'entropy_file' => "",
        //'entropy_length' => "0",
        //'hash_bits_per_character' => "4",
        //'hash_function' => "0",
        //'lazy_write' => "1",
        //'referer_check' => "",
        //'serialize_handler' => "php",
        //'upload_progress.enabled' => "1",
        //'upload_progress.cleanup' => "1",
        //'upload_progress.prefix' => "upload_progress_",
        //'upload_progress.name' => "PHP_SESSION_UPLOAD_PROGRESS",
        //'upload_progress.freq' => "1%",
        //'upload_progress.min-freq' => "1",
        //'url_rewriter.tags' => "a=href,area=href,frame=src,form=,fieldset=",
        //'sid_length' => "32",
        //'sid_bits_per_character' => "5",
        //'trans_sid_hosts' => $_SERVER['HTTP_HOST'],
        //'trans_sid_tags' => "a=href,area=href,frame=src,form=",

    ]
];
