<?php

namespace App\Controllers;

class ThanksController extends BaseController
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'thanks.twig');
    }
}
