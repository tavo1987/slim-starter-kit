<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Valitron\Validator as V;
use Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

try {
	(new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
	//
}

/**
 * Valitron Library
 */
//V::langDir(__DIR__.'/../resources/lang/valitron'); // always set langDir before lang.
//V::lang(getenv('VALIDATOR_LANG'));

/**
 * App Init
 */
$app = new App([
	'settings' => [
		'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
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

$container = $app->getContainer();

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

/**
 * Eloquent configuration
 */
require_once __DIR__ . '/../config/database.php';

/*
 * Routes
 */
require_once __DIR__ . '/../routes/web.php';




