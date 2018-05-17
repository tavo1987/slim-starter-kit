<?php

use Illuminate\Support\Collection;

function collection($data)
{
    $collection = new Collection($data);
    return $collection;
}

function parseUrl($url)
{
    return explode('/', filter_var(trim( $url , '/'), FILTER_SANITIZE_URL));
}

function sendEmail($to, $name, $subject, $template, $lead)
{
	$path =  __DIR__. "/../resources/templates-emails/";
	ob_start();
	require $path . $template . '.php' ;
	$html = ob_get_clean();

	//$transport = (new Swift_SendmailTransport('/usr/sbin/sendmail -bs'));
	$transport = new Swift_SmtpTransport(getenv('MAIL_HOST'), getenv('MAIL_PORT'));
	$transport->setUsername(getenv('MAIL_USERNAME'))
	          ->setPassword(getenv('MAIL_PASSWORD'));

	$mailer = new Swift_Mailer($transport);

	$message = (new Swift_Message($subject))
		->setFrom([getenv('MAIL_FROM') => getenv('NAME_COMPANY')])
		->setTo([ $to => $name])
		->setBody($html, 'text/html');

	try{
		$mailer->send($message);
	}catch (Exception $e) {
		throw new $e($e->getMessage());
	}
}