<?php

namespace App\Middleware;

use Interop\Container\ContainerInterface;

class OldInputMiddleware
{
	/**
	 * @var ContainerInterface
	 */
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function __invoke($request, $response, $next)
	{
		if ($this->container->session->exists('old')) {
			$this->container->view->getEnvironment()->addGlobal('old', $this->container->session->get('old'));
		}

		$this->container->session->set('old', $request->getParams());

		$response = $next($request, $response);
		return $response;
	}
}