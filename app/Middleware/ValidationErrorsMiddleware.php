<?php

namespace App\Middleware;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;


class ValidationErrorsMiddleware
{
	/**
	 * @var ContainerInterface
	 */
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function __invoke(Request $request, Response $response, callable  $next)
	{
		if ($this->container->session->exists('errors')) {
			$this->container->view->getEnvironment()->addGlobal('errors', $this->container->session->get('errors'));
		}

		$this->container->session->delete('errors');

		$response = $next($request, $response);
		return $response;
	}
}