<?php

use App\Controllers\Admin\LeadsReportController;
use App\Controllers\Auth\PasswordController;

$app->get('/reports', LeadsReportController::class . ':index')->setName('reports');
$app->get('/auth/signout', AuthController::class.':getSignOut')->setName('auth.signout');

$app->get('/auth/password/change', PasswordController::class.':getChangePassword')->setName('auth.password.change');
$app->post('/auth/password/change', PasswordController::class.':postChangePassword');