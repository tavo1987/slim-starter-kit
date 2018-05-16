<?php

use App\Controllers\HomeController;
use App\Controllers\LeadController;
use App\Controllers\ThanksController;

$app->get('/', HomeController::class.':index');

$app->get('/test/{id}', HomeController::class.':test');

$app->post('/store', LeadController::class.':store');

$app->get('/lead/{name}', LeadController::class.':search');

$app->get('/thanks/{name}', ThanksController::class.':index');

