<?php

namespace App\Controllers;

use App\Entities\Lead;

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

    public function store($request, $response)
    {

        $lead            = new Lead();
        $lead->name      = $request->getParam('name');
        $lead->email     = $request->getParam('email');
        $lead->date      = date('Y-m-d H:i:s');

        if (!$lead->isRegistered($lead->email)) {
            $lead->save();
        }

        sendEmail($lead->email, $lead->name, getenv('LEAD_EMAIL_SUBJECT'), 'lead', $lead);
        sendEmail(getenv('ADMIN_EMAIL'), 'Edwin Ramírez', getenv('LEAD_EMAIL_SUBJECT'), 'admin', $lead);

	    return $response->withRedirect('/thanks', 301);
    }
}
