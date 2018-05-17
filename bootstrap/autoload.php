<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware;

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
 * Configuration default time zone
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
 * Eloquent configuration
 */
require_once __DIR__ . '/../config/database.php';

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

	return $view;
};

/**
 * Custom notFoundHandler for 404
 *
 * @param $container
 *
 * @return Closure
 */
$container['notFoundHandler'] = function ($container) {
	return function ($request, $response) use ($container) {
		$container->view->render($response, '404.twig');
		return $response->withStatus(404);
	};
};

/**
 * WhoopsMiddleware
 */
$app->add(new WhoopsMiddleware);

/*
 * Routes
 */
require_once __DIR__ . '/../routes/web.php';




