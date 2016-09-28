<?php

namespace App\Controllers;

class ErrorController
{
    public function index()
    {
        return view('error.twig');
    }
}
