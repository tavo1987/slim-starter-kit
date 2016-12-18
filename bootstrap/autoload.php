<?php

use Dotenv\Dotenv;
use Valitron\Validator as V;

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', true);
error_reporting(E_ALL);

/**
 * Para manejar errores
 */
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//PATH DEL APP
define('APP_PATH', __DIR__ . '/../');

/**
 * Configuration dotenv
 */

$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

date_default_timezone_set(getenv('SET_TIME_LOCATE'));

/**
 * Valitron Library
 */
V::langDir(__DIR__.'/../resources/lang/valitron'); // always set langDir before lang.
V::lang(getenv('VALIDATOR_LANG'));

/**
 * Eloquent configuration
 */
require_once __DIR__ . '/../config/database.php';

/**
 * App Init
 */
$app = new \Core\App;
require_once __DIR__ . '/../app/routes.php';




