<?php

use Illuminate\Database\Capsule\Manager;

$capsule = new Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Service factory for the ORM
$container['db'] = function ($container) use ($capsule) {
	return $capsule;
};