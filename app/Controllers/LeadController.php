<?php

namespace App\Controllers;

use App\Entities\Lead;
use App\Requests\LeadFormRequest;
use Slim\Http\Request;
use Slim\Http\Response;

class LeadController extends BaseController
{
    public function store(Request $request, Response $response)
    {
    	$this->validator->validate($request, LeadFormRequest::rules());

    	if ($this->validator->failed()) {
			return $response->withRedirect($this->container->router->pathFor('home'), 302);
	    }

        $lead            = new Lead();
        $lead->name      = $request->getParam('name');
        $lead->cedula      = $request->getParam('cedula');
        $lead->email     = $request->getParam('email');

        if (!$lead->isRegistered($lead->email)) {
            $lead->save();
        }

        sendEmail($lead->email, $lead->name, getenv('LEAD_EMAIL_SUBJECT'), 'lead', $lead);
        sendEmail(getenv('ADMIN_EMAIL'), 'Edwin Ramírez', getenv('ADMIN_EMAIL_SUBJECT'), 'admin', $lead);

	    return $response->withRedirect($this->router->pathFor('thanks'));
    }
}
