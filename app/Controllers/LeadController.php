<?php

namespace App\Controllers;

use App\Entities\Lead;
use Core\Controllers\EmailController  as Email;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

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
        //$errors = $this->validate($_POST, $this->rules, $this->labels);

       /* if ($errors) {
            return view('home.twig', compact('errors'));
        }*/

        $lead            = new Lead();
        $lead->name      = $request->getParam('name');
        $lead->email     = $request->getParam('email');
        $lead->date      = date('Y-m-d H:i:s');

        if (!$lead->isRegistered($lead->email)) {
            $lead->save();
        }

	    return $response->withRedirect('/thanks', 301);
    }

    /**
     * Route params example
     * if the path has parameters, the $ response parameter is required as the first method argument
     * @param $response
     * @param $name
     */
    public function search($response, $name)
    {
        dd($name);
    }
}
