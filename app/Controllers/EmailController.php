<?php 

namespace App\Controllers;

use SendGrid\Email as SendGridEmail;
use SendGrid;


class EmailController
{

	/**
	 * @param string $to
	 * @param string $from
	 * @param string $subject
	 * @param string $html
	 * @param string $name
	 * @param string $company
	 * @return void
	 */
	public static function send($to, $from, $subject, $html,$name ='', $company = 'Lactacyd' ){

		$sendgrid = new SendGrid($_ENV['SENDGRID_APIKEY'], ["turn_off_ssl_verification" => true]);
		$email    = new SendGridEmail();
		$email->addTo($to, $name)
		      ->setFrom($from)
			  ->setFromName($company)
		      ->setSubject($subject)
		      ->setHtml($html);	      

		try {

		    $sendgrid->send($email);

		} catch(Exception $e) {

		    echo $e->getCode();

		    foreach($e->getErrors() as $er) {
		        echo $er;
		    }

		}//FIN TRY

	}//FIN SEND

	
}//FIN EMAIL




