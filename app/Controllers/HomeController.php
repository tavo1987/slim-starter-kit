<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index($request, $response)
    {
	    return $this->view->render($response, 'home.twig');
    }

    public function test($request, $response, $args)
    {
    	$id = $args['id'];

	    return $this->view->render($response, 'home.twig');
    }
}
