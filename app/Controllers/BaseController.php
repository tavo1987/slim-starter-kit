<?php

namespace  App\Controllers;

use App\Auth\Auth;
use App\Validation\Validator;
use Illuminate\Database\DatabaseManager;
use Interop\Container\ContainerInterface;
use Slim\Flash\Messages;
use Slim\Router;
use Slim\Views\Twig;
use SlimSession\Helper;

/**
 * IDE Support for Dynamic properties
 *
 * @property  DatabaseManager $db;
 * @property Twig $view
 * @property Router $router
 * @property Messages $flash
 * @property Helper $session
 * @property Auth $auth
 * @property Validator $validator
 */
class BaseController
{
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function __get($property)
	{
		if ($this->container->{$property}) {
			return $this->container->{$property};
		}
	}
}
