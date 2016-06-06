<?php

namespace App\Controllers;

use App\Entities\Quiz;
use App\Controllers\EmailController  as Email;



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    foreach ($_POST as $key => $value){
        $_POST[$key] = clean_input($value);
    }

    if (isset($_POST['use_intimate_soap'])       && !empty($_POST['use_intimate_soap'])         &&
        isset($_POST['known_brands'])            && !empty($_POST['known_brands'])              &&
        isset($_POST['frequency_use'])           && !empty($_POST['frequency_use'])             &&
        isset($_POST['rate'])                    && !empty($_POST['rate'])                      &&
        isset($_POST['knew_lactacyd'])           && !empty($_POST['knew_lactacyd'])             &&
        isset($_POST['like_about_lactacyd'])     && !empty($_POST['like_about_lactacyd'])       &&
        isset($_POST['dislike_about_lactacyd'])  && !empty($_POST['dislike_about_lactacyd'])    &&
        isset($_POST['continue_using_lactacyd']) && !empty($_POST['continue_using_lactacyd'])   &&
        isset($_POST['recommend'])               && !empty($_POST['recommend'])                 &&
        isset($_POST['like_read_website'])       && !empty($_POST['like_read_website'])
    ){

        $quiz = new Quiz();
        $quiz->use_intimate_soap        = $_POST['use_intimate_soap'];
        $quiz->known_brands             = $_POST['known_brands'];
        $quiz->frequency_use            = $_POST['frequency_use'];
        $quiz->rate                     = $_POST['rate'];
        $quiz->knew_lactacyd            = $_POST['knew_lactacyd'];
        $quiz->like_about_lactacyd      = $_POST['like_about_lactacyd'];
        $quiz->dislike_about_lactacyd   = $_POST['dislike_about_lactacyd'];
        $quiz->continue_using_lactacyd  = $_POST['continue_using_lactacyd'];
        $quiz->recommend                = $_POST['recommend'];
        $quiz->like_read_website        = $_POST['like_read_website'];
        $quiz->date                     = date('Y-m-d H:i:sa');
        $quiz->save();
        
        
        header('Location: http://localhost:9001/lactacyd-quiz/thankyou');

        exit();
        /*$inputs = $_POST;

        foreach ($inputs as $input){
            echo $input . '<br>';
        }*/
    }else{
        echo  'Llena todos los campos';
    }

}else{
    return die('Request Denegado');
}//FIN REQUEST_METHOD


