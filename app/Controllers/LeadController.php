<?php

namespace App\Controllers;

use App\Entities\Lead;
use App\Controllers\EmailController  as Email;

if (!isPost()) {
    die('access denied');
}

$post   = cleanRequest($_POST);
$errors = validateData($post);

if ($errors) {
    redirect('error');
    exit();
}

$request = (object) $post;

    $lead = new Lead();
    $lead->name      = $request->name;
    $lead->email = $request->email;
    $lead->date      = date('Y-m-d H:i:s');

    if (!isRegistered($request->email)) {
        $lead->save();
    }

    Email::send($lead->email, 'tavo198718@gmail.com', 'Gracias por Contáctarnos', 'lead', $lead, 'Company name');
    Email::send('tavo198718@gmail.com', 'tavo198718@gmail.com', 'Nuevo datos', 'admin', $lead, 'Company name');

    redirect('thanks');

function isRegistered($email)
{
    $lead = Lead::where('email', '=', $email)->first();
    return $lead ? 1 : 0 ;
}
