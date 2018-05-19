<?php

use Slim\Http\Uri;
use Slim\Views\Twig;

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