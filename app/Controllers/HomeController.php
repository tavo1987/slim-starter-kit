<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index($request, $response)
    {
	    return $this->view->render($response, 'home.twig');
    }
}
