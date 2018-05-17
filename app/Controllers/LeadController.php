<?php

namespace App\Controllers;

use App\Entities\Lead;
use Slim\Http\Request;
use Slim\Http\Response;

class LeadController extends BaseController
{
    public function store(Request $request, Response $response)
    {
    	$this->container->validator->validate($request, [
    		'name' => ['required'],
    		'email' => ['required', 'email'],
	    ]);

    	if ($this->container->validator->failed()) {
			return $response->withRedirect($this->container->router->pathFor('home'), 302);
	    }

        $lead            = new Lead();
        $lead->name      = $request->getParam('name');
        $lead->email     = $request->getParam('email');
        $lead->date      = date('Y-m-d H:i:s');

        if (!$lead->isRegistered($lead->email)) {
            $lead->save();
        }

        sendEmail($lead->email, $lead->name, getenv('LEAD_EMAIL_SUBJECT'), 'lead', $lead);
        sendEmail(getenv('ADMIN_EMAIL'), 'Edwin Ramírez', getenv('LEAD_EMAIL_SUBJECT'), 'admin', $lead);

	    return $response->withRedirect($this->container->router->pathFor('thanks'), 201);
    }
}
