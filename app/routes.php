<?php

use App\Controllers\HomeController;
use App\Controllers\LeadController;
use App\Controllers\ThanksController;

$app->get('/', [HomeController::class, 'index']);
$app->post('/store', [LeadController::class, 'store']);
$app->get('/lead/{name}', [LeadController::class, 'search']);
$app->get('/error', function (){
    return view('error.twig');
});
$app->get('/thanks/{name}', [ThanksController::class, 'index']);

