<?php


namespace App\Middleware;

use Interop\Container\ContainerInterface;

class Middleware
{
	/**
	 * @var ContainerInterface
	 */
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}
}