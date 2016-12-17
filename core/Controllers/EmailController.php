<?php

namespace Core\Controllers;

use SendGrid;
use SendGrid\Content;
use SendGrid\Email as SendGridEmail;
use SendGrid\Mail;

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

        $from    = new SendGridEmail(getenv('NAME_COMPANY'), getenv('FROM'));
        $to      = new SendGridEmail(null, $to);
        $content = new Content("text/html", $html);
        $mail    = new Mail($from, $subject, $to, $content);

        $apiKey = getenv('SENDGRID_APIKEY');
        $sg     = new SendGrid($apiKey);

        try {
            $sg->client->mail()->send()->post($mail);
        } catch (Exception $e) {
            echo $e->getCode();

            foreach ($e->getErrors() as $er) {
                echo $er;
            }
        }//END TRY*/
    }//END SEND
}//END EMAIL
