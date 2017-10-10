<?php

namespace App\Controllers;

class ThanksController
{
    public function index($response, $name)
    {
        $name = ucfirst($name);
        return view('thanks.twig', compact('name'));
    }
}
