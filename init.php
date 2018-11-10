<?php

// Path to the application folder
define('BASEPATH', rtrim(str_replace("\\", "/", __DIR__), '/'));

/*
 *---------------------------------------------------------------
 * AUTO LOADER
 *---------------------------------------------------------------
 *
 */
require_once(BASEPATH . '/vendor/autoload.php');

/*
 * -------------------------------------------------------------------
 *  Whoops
 * -------------------------------------------------------------------
 * PHP errors for cool kids http://filp.github.io/whoops/
 */
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

/*
 *---------------------------------------------------------------
 * ENVIRONMENT LOADER
 *---------------------------------------------------------------
 *
 */
$dotenv = new Dotenv\Dotenv(BASEPATH);
$dotenv->load();

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     local
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
switch (env('APP_ENV', 'local')) {
    case 'local':
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        break;

    case 'production':
        error_reporting(0);
        ini_set("display_errors", 0);
        break;

    default:
        exit('The application environment is not set correctly.');
}

/*
 *---------------------------------------------------------------
 * CONFIG LOADER
 *---------------------------------------------------------------
 *
 */
use Noodlehaus\Config;
$config = new Config([
    __DIR__ . '/config/app.php',
    __DIR__ . '/config/database.php',
    __DIR__ . '/config/session.php',
    __DIR__ . '/config/auth.php',
]);

/*
 * -------------------------------------------------------------------
 *  SYMFONY HTTP FOUNDATION
 * -------------------------------------------------------------------
 */
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

/*
 * -------------------------------------------------------------------
 *  MySQL Database Connection using mysqli driver...
 * -------------------------------------------------------------------
 */
//$mysqli = mysqliConnect(config('db.host'), config('db.username'), config('db.password'), config('db.name'), config('db.charset'));

/*
 * -------------------------------------------------------------------
 *  MySQL Database Connection using PDO driver...
 * -------------------------------------------------------------------
 */
$pdo = pdoMysqlConnect(config('db.host'), config('db.username'), config('db.password'), config('db.name'), config('db.charset'));

/*
 * -------------------------------------------------------------------
 *  LARAVEL ELOQUENT
 * -------------------------------------------------------------------
 */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => config('db.host'),
    'database' => config('db.name'),
    'username' => config('db.username'),
    'password' => config('db.password'),
    'charset' => config('db.charset'),
    'collation' => config('db.charset') . '_general_ci',
    'prefix' => config('db.table_prefix')
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

/*
 * -------------------------------------------------------------------
 *  SESSION INITIALIZATION
 * -------------------------------------------------------------------
 */
use moharram82\Session\Session;

$session = new Session();
$session->start();

/*
 * -------------------------------------------------------------------
 *  CSRF Protection
 * -------------------------------------------------------------------
 *
 */
use moharram82\Security\CSRF;

$csrf = new CSRF($session, $request);

/*
 * -------------------------------------------------------------------
 *  Authentication Manager
 * -------------------------------------------------------------------
 *
 */
use moharram82\Auth\Auth;

$auth = new Auth($session, $request);

/*
 *---------------------------------------------------------------
 * APPLICATION LOCALE
 *---------------------------------------------------------------
 *
 */
$language = config_app_locale();

/*
 *---------------------------------------------------------------
 * APPLICATION PATHS
 *---------------------------------------------------------------
 * Use a full server path.
 * NO TRAILING SLASH!
 */
$public_folder = 'public_html';
$views_folder = 'views';
$public_path = rtrim(BASEPATH . '/' . $public_folder, '/');
$views_path = rtrim(BASEPATH . '/' . $views_folder . '/' . $language, '/');

// Is the public path correct?
if (!is_dir($public_path)) {
    exit("Your public folder path does not appear to be set correctly.");
}

// Is the views path correct?
if (!is_dir($views_path)) {
    exit("Your views folder path does not appear to be set correctly.");
}

/*
 *---------------------------------------------------------------
 * HTTP PROTOCOL
 *---------------------------------------------------------------
 *
 */
if (empty($_SERVER['HTTPS'])) {
	$protocol = 'http://';
} else {
	$protocol = 'https://';
}

// Base URL Path to the Application
define('BASEURL', $protocol . rtrim(removeHttpProtocol(env('APP_URL')), '/'));

// Path to the views folder
define('VIEWSPATH', rtrim(str_replace("\\", "/", $views_path), '/'));

// Path to the public folder
define('PUBLICPATH', rtrim(str_replace("\\", "/", $public_path), '/'));

// Path to the current page
define('SELF', rtrim(str_replace("\\", "/", $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']), '/'));

// Load views configuration file
require_once(BASEPATH . '/config/view.php');

// Load pagination configuration file
require_once(BASEPATH . '/config/pagination.php');

/*
 * ------------------------------------------------------
 * APPLICATION CHARSET
 * ------------------------------------------------------
 *
 */
config_app_charset();

/*
 * -------------------------------------------------------------------
 *  TIME ZONE
 * -------------------------------------------------------------------
 */
date_default_timezone_set(config('time_zone'));
