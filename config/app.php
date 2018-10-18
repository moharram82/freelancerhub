<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Encoding
    |--------------------------------------------------------------------------
    |
    */

    'charset' => 'UTF-8',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    | Possible values: development, production.
    |
    */

    'env' => env('APP_ENV', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost/'),

    /*
    |--------------------------------------------------------------------------
    | Master Time Reference & Timezone
    |--------------------------------------------------------------------------
    |
    | Options are 'local' or 'gmt'.  This pref tells the system whether to use
    | your server's local time as the master 'now' reference, or convert it to
    | GMT.  See the 'date helper' page of the user guide for information
    | regarding date handling.
    |
    */

    'time_reference' => 'local',
    'time_zone' => 'Africa/Khartoum',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',
    'languages' => [
        'ar',
        'en'
    ],

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | If you use the Encryption class or the Session class you
    | MUST set an encryption key.  See the user guide for info.
    |
    */
    
    'encryption_key' => env('APP_KEY'),

    /*
     * -------------------------------------------------------------------
     *  CSRF Protection
     * -------------------------------------------------------------------
     *
     */

    'csrf' => [

        'enabled' => true,
        'field_name' => '_token',
        'token_id' => 'csrf_token',

    ],

];
