<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

//Indicamos en el siguiente array los datos de configuración de la BD
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_DATABASE'),
    'username'  => getenv('DB_USERNAME'),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

//iniciamos Eloquent
$capsule->bootEloquent();