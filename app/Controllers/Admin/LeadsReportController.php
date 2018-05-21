<?php


namespace App\Controllers\Admin;


use App\Controllers\BaseController;

class LeadsReportController extends BaseController
{
	public function index($request, $response)
	{
		$this->view->render($response, 'admin/reports.twig');
	}
}