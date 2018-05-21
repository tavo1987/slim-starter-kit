<?php

use App\Middleware\CsrfViewMiddleware;
use App\Middleware\OldInputMiddleware;
use App\Middleware\ValidationErrorsMiddleware;
use Slim\Middleware\Session;
use Zeuxisoo\Whoops\Provider\Slim\WhoopsMiddleware;

$app->add(new WhoopsMiddleware);
$app->add(new CsrfViewMiddleware($container));
$app->add($container->csrf);
$app->add(new ValidationErrorsMiddleware($container));
$app->add(new OldInputMiddleware($container));
$app->add(new Session([
	'name' => getenv('APP_NAME'),
	'autorefresh' => true,
	'lifetime' => '1 hour'
]));
