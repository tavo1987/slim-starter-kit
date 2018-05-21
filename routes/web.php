<?php

use App\Controllers\HomeController;
use App\Controllers\LeadController;
use App\Controllers\ThanksController;

$app->get('/', HomeController::class.':index')->setName('home');
$app->post('/store', LeadController::class.':store')->setName('leads.store');
$app->get('/thanks', ThanksController::class.':index')->setName('thanks');
