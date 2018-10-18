<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Database Parameters
    |--------------------------------------------------------------------------
    |
    */

	'db' => [
		
		'host' => env('DB_HOST', '127.0.0.1'),
		'name' => env('DB_DATABASE', 'test'),
		'username' => env('DB_USERNAME', 'test'),
		'password' => env('DB_PASSWORD', ''),
		'charset' => env('DB_CHARSET', 'utf8'),
		'table_prefix' => '',
	],
];
