<?php

namespace App\Requests;

class LeadFormRequest
{
	public static function rules(){
		return [
			'name' => 'required',
			'cedula' => ['required','cedula'],
			'email' => ['required', 'email'],
		];
	}
}