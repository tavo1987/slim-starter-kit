<?php

use App\Validation\Validator;
use Slim\App;
use Slim\Csrf\Guard;
use Slim\Http\Uri;
use Slim\Middleware\Session;
use Slim\Views\Twig;
use SlimSession\Helper;
use Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware;
use Valitron\Validator as V;

/**
 * Composer autoload
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Dot env configuration
 */
try {
	(new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
	//
}

/**
 * Valitron Library
 */
V::langDir(__DIR__.'/../resources/lang/valitron'); // always set langDir before lang.
V::lang(getenv('VALIDATOR_LANG'));

/**
 * Configuration to default time zone
 */
date_default_timezone_set(getenv('SET_TIME_LOCATE'));

/**
 * App Init
 */
$app = new App([
	'settings' => [
		'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
		'db' => [
			'driver' => 'mysql',
			'host' => getenv('DB_HOST'),
			'database' => getenv('DB_DATABASE'),
			'username' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASSWORD'),
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		],
		'debug' => getenv('APP_DEBUG') === 'true',
		'whoops.editor' => 'sublime',
		'app' => [
			'name' => getenv('APP_NAME')
		],
		'views' => [
			'cache' => getenv('VIEW_CACHE_DISABLED') === 'true' ? false : __DIR__ . '/../storage/views'
		]
	],
]);

/**
 * Get container
 */
$container = $app->getContainer();

/**
 * Auth support
 * @param $container
 *
 * @return \App\Auth\Auth
 */
$container['auth'] = function ($container) {
	return new \App\Auth\Auth($container);
};

/**
 * Flash messages
 *
 * @param $container
 *
 * @return \Slim\Flash\Messages
 */
$container['flash'] = function ($container) {
	return new \Slim\Flash\Messages;
};

/**
 * Twig configuration
 * @param $container
 *
 * @return Twig
 */
$container['view'] = function ($container) {
	$view = new Twig(__DIR__ . '/../resources/views', [
		'cache' => $container->settings['views']['cache']
	]);
	// Instantiate and add Slim specific extension
	$router = $container->get('router');
	$uri = Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
	$view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

	$view->getEnvironment()->addGlobal('auth', [
		'check' => $container->auth->check(),
		'user' => $container->auth->user(),
	]);

	$view->getEnvironment()->addGlobal('flash', $container->flash);

	return $view;
};

/**
 * Eloquent configuration
 */
require_once __DIR__ . '/../config/database.php';

/**
 * @param $container
 *
 * @return Validator
 */
$container['validator'] = function ($container) {
	return new Validator($container);
};

/**
 * Registering Globally Session Helpers
 */
$container['session'] = function () {
	return new Helper;
};

/**
 * CSRF support
 */
$container['csrf'] = function () {
	return new Guard;
};

/**
 * Middleware
 */
$app->add(new WhoopsMiddleware);
$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));
$app->add($container->csrf);
$app->add(new Session([
	'name' => getenv('APP_NAME'),
	'autorefresh' => true,
	'lifetime' => '1 hour'
]));

/*
 * Routes
 */
require_once __DIR__ . '/../routes/web.php';




