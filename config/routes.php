<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

/*
 * Web routes
 */
require_once __DIR__ . '/../routes/web.php';

/**
 * Guest Routes
 */
$app->group('', function ($app) {
	require_once __DIR__ . '/../routes/guest.php';
})->add(new GuestMiddleware($container));

/**
 * Auth Routes
 */
$app->group('', function ($app) {
	require_once __DIR__ . '/../routes/auth.php';
})->add(new AuthMiddleware($container));

