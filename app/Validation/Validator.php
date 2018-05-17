<?php

namespace App\Validation;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Valitron\Validator as Valitron;

class Validator
{
	protected $errors = [];
	protected $container;

	public function __construct(ContainerInterface $container)
	{
		$this->container = $container;
	}

	public function validate(Request $request, array $rules)
	{
		$validator = new Valitron($request->getParsedBody());

		$validator->mapFieldsRules($rules);

		if (!$validator->validate()) {
			$this->errors = $validator->errors();
			$this->container->session->set('errors', $validator->errors());
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
}