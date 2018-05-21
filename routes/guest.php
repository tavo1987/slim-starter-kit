<?php

use App\Controllers\Auth\AuthController;

$app->get('/auth/signup', AuthController::class . ':getSignUp')->setName('auth.signup');
$app->post('/auth/signup', AuthController::class.':postSignUp');

$app->get('/auth/signin', AuthController::class.':getSignIn')->setName('auth.signin');
$app->post('/auth/signin', AuthController::class.':postSignIn');