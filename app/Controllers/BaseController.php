<?php

namespace  App\Controllers;

use Interop\Container\ContainerInterface;

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
