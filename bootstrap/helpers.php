<?php

function view($template, $vars = [])
{
    $loader = new Twig_Loader_Filesystem('resources/views/');
    $twig = new Twig_Environment($loader);
    echo $twig->render($template, $vars);
}


function controller($controller)
{
    $controller = ucfirst($controller).'Controller';

    $file = __DIR__. "/../app/Controllers/$controller".".php";

    if (file_exists($file)) {
        require $file;
    } else {
        http_response_code(404);

        return view('404.twig');
    }
}


/**
 * @param $data
 * @return mixed|string
 */
function clean_input($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = str_replace(
        array("\\", "¨", "º", "-", " ",
            "#", "@", "|", "!", "\"",
            "·", "$", "%", "&", "/",
            "(", ")", "?", "'", "¡",
            "¿", "[", "^", "<code>", "]",
            "+", "}", "{", "¨", "´",
            ">", "<", ";", ",", ":", "Ç"),
        '',
        $data
    );

    return $data;
}

function validateData($post)
{
    $errors =false;

    foreach ($post as $key => $value) {
        if (!isset($key) || empty($value)) {
            $errors = true;
        }
    }

    return $errors;
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }

    return false;
}

function cleanRequest($post = array())
{
    foreach ($post as $key => $value) {
        if (!isEmail($key)) {
            $post[$key] = clean_input($value);
        }
    }

    return $post;
}

function isEmail($key)
{
    if ($key == 'email') {
        return true;
    }

    return false;
}


function redirect($url)
{
    header('Location: '.getenv('SITE_URL').$url);
}
