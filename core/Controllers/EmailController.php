<?php

namespace Core\Controllers;

use SendGrid\Email as SendGridEmail;
use SendGrid;

class EmailController
{

    protected static $path =  __DIR__. "/../../resources/templates-emails/";

    /**
     * @param string $to
     * @param string $from
     * @param string $subject
     * @param string $html
     * @param string $name
     * @param string $company
     * @return void
     */
    public static function send($to, $subject, $template, $lead)
    {
        ob_start();
        require static::$path . $template . '.php' ;
        $html = ob_get_clean();

        $sendgrid = new SendGrid($_ENV['SENDGRID_APIKEY'], ["turn_off_ssl_verification" => true]);
        $email    = new SendGridEmail();
        $email->addTo($to)
              ->setFrom($_ENV['FROM'])
              ->setFromName($_ENV['NAME_COMPANY'])
              ->setSubject($subject)
              ->setHtml($html);
        try {
            $sendgrid->send($email);
        } catch (Exception $e) {
            echo $e->getCode();

            foreach ($e->getErrors() as $er) {
                echo $er;
            }
        }//FIN TRY
    }//FIN SEND
}//FIN EMAIL
