<?php

use App\Controllers\Admin\LeadsReportController;
use App\Controllers\Auth\AuthController;
use App\Controllers\Auth\PasswordController;
use App\Controllers\HomeController;
use App\Controllers\LeadController;
use App\Controllers\ThanksController;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

/**
 * Guest Routes
 */
	$app->get('/', HomeController::class.':index')->setName('home');
	$app->post('/store', LeadController::class.':store')->setName('store');
	$app->get('/thanks', ThanksController::class.':index')->setName('thanks');


/**
 * Guest users
 */

$app->group('', function () {
	$this->get('/auth/signup', AuthController::class.':getSignUp')->setName('auth.signup');
	$this->post('/auth/signup', AuthController::class.':postSignUp');

	$this->get('/auth/signin', AuthController::class.':getSignIn')->setName('auth.signin');
	$this->post('/auth/signin', AuthController::class.':postSignIn');
})->add(new GuestMiddleware($container));

/**
 * Auth Users
 */
$app->group('', function () {
	$this->get('/reports', LeadsReportController::class.':index')->setName('reports');
	$this->get('/auth/signout', AuthController::class.':getSignOut')->setName('auth.signout');

	$this->get('/auth/password/change', PasswordController::class.':getChangePassword')->setName('auth.password.change');
	$this->post('/auth/password/change', PasswordController::class.':postChangePassword');
})->add(new AuthMiddleware($container));

