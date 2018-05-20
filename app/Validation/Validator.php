<?php

namespace App\Validation;

use App\Validation\Rules\Cedula;
use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Valitron\Validator as Valitron;

class Validator
{
	protected $errors = [];
	protected $container;
	protected $validator;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
		$this->registerCustomRules();
	}

	public function validate(Request $request, array $rules)
	{
		$this->validator = new Valitron($request->getParsedBody());
	    $this->validator->mapFieldsRules($rules);
	    if (!$this->validator->validate()) {
		    $this->errors = $this->validator->errors();
		    $this->container->session->set('errors', $this->errors);
	    }

		return $this;
	}

	public function failed()
	{
		return !empty($this->errors);
	}

	public function errors()
	{
		return $this->errors;
	}

	public function registerCustomRules()
	{
		(new Cedula())->init();
	}
}