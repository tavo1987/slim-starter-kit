<?php

namespace App\Controllers;

use App\Entities\Lead;
use Core\Controllers\EmailController  as Email;

class LeadController
{

    public function store()
    {
        $post   = cleanRequest($_POST);
        $errors = validateData($post);

        if ($errors) {
            redirect('error');
            exit();
        }

        $request = (object) $post;

        $lead            = new Lead();
        $lead->name      = $request->name;
        $lead->email     = $request->email;
        $lead->date      = date('Y-m-d H:i:s');

        if (!$this->isRegistered($request->email)) {
            $lead->save();
        }

        Email::send($lead->email, getenv('LEAD_EMAIL_SUBJECT'), 'lead', $lead);
        Email::send(getenv('ADMIN_EMAIL'), getenv('ADMIN_EMAIL_SUBJECT'), 'admin', $lead);

        redirect('thanks');
    }

    public function isRegistered($email)
    {
        $lead = Lead::where('email', '=', $email)->first();
        return $lead ? 1 : 0 ;
    }
}
