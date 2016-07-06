<?php

namespace App\Controllers;

use App\Entities\Quiz;
use App\Controllers\EmailController  as Email;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = clean_input($value);
    }

    header('Location: http://localhost:9001/lactacyd-quiz/thankyou');
} else {
    return die('Request Denegado');
}//FIN REQUEST_METHOD
