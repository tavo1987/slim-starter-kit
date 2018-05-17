<?php

namespace  App\Controllers;

use Interop\Container\ContainerInterface;

class BaseController
{
	protected $container;
	protected $view;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
		$this->view = $this->container['view'];
	}
}
