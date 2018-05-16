<?php

namespace  App\Controllers;

use Interop\Container\ContainerInterface;
use Slim\Views\Twig;
use Valitron\Validator as Valitron;

class BaseController
{
	protected $container;
	protected $view;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
		$this->view = $this->container['view'];
	}

	/**
     * @param $data
     * @param $rules
     * @param $labels
     * @return array|bool
     */
    public function validate($data, $rules, $labels)
    {
        $valitron = new Valitron($data);
        $valitron->rules($rules);
        $valitron->labels($labels);

        if (!$valitron->validate()) {
            $collection = collection($valitron->errors());
            return $collection->flatten()->all();
        }
        return false;
    }
}
