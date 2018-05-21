<?php

namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;


class ValidationErrorsMiddleware extends Middleware
{
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