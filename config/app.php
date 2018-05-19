<?php

use Slim\App;

$app = new App([
	'settings' => [
		'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
		'db' => [
			'driver' => getenv('DB_CONNECTION'),
			'host' => getenv('DB_HOST'),
			'port' => getenv('DB_PORT'),
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