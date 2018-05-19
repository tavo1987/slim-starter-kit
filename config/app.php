<?php

use Slim\App;

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