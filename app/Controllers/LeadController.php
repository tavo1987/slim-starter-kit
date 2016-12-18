<?php

namespace App\Controllers;

use App\Entities\Lead;
use Core\Controllers\EmailController  as Email;

class LeadController extends BaseController
{
    /**
     * Validations rules to $_POST data
     * @var [array]
     */
    protected $rules = [
            'required' => [
                ['name'],
                ['email'],
            ],
            'lengthMin' => [
                ['name', 3],
            ],

            'email' => 'email',
        ];

    /**
     * Input labels
     * @var array
     */
    protected $labels = [
        'name'  => 'Name',
        'email' => 'Email',
    ];


    public function store()
    {
        $errors = $this->validate($_POST, $this->rules, $this->labels);

        if ($errors) {
            return view('home.twig', compact('errors'));
        }

        $request = (object) cleanRequest($_POST);

        $lead            = new Lead();
        $lead->name      = $request->name;
        $lead->email     = $request->email;
        $lead->date      = date('Y-m-d H:i:s');

        if (!$lead->isRegistered($request->email)) {
            $lead->save();
        }

        Email::send($lead->email, getenv('LEAD_EMAIL_SUBJECT'), 'lead', $lead);
        Email::send(getenv('ADMIN_EMAIL'), getenv('ADMIN_EMAIL_SUBJECT'), 'admin', $lead);

        redirect('thanks');
    }
}
