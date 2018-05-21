<?php

namespace App\Validation\Rules;

use Tavo\ValidadorEc;
use Valitron\Validator as Valitron;

class Cedula
{
	/**
	 * @var ValidadorEc
	 */
	private $validator;
	protected $message = 'no es una cédula correcta';

	public function __construct()
	{
		$this->validator = new ValidadorEc();
	}

	public function init()
	{
		Valitron::addRule('cedula', function($field, $value, array $params, array $fields){
			$result = $this->validator->validarCedula($value);
			return $result;
		},$this->message);
	}
}