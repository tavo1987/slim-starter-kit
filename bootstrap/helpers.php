<?php

use Illuminate\Support\Collection;

function view($template, $vars = [])
{
    $loader = new Twig_Loader_Filesystem('resources/views/');
    $twig = new Twig_Environment($loader);
    echo $twig->render($template, $vars);
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
        array("\\", "¨", "º", "-",
            "#", "|", "!", "\"",
            "·", "$", "&", "/",
            "(", ")", "?", "'", "¡",
            "¿", "[", "^", "<code>", "]",
            "+", "}", "{", "¨", "´",
            ">", "<", ";", "Ç"),
        ' ',
        $data
    );

    return $data;
}

function cleanRequest($post = array())
{
    foreach ($post as $key => $value) {
        $post[$key] = clean_input($value);
    }

    return $post;
}

function redirect($url)
{
    $slash = substr($url, 0, 1);

    if ($slash === '/') {
        return header('Location: '.getenv('SITE_URL').$url);
    }
    return header('Location: '.getenv('SITE_URL').'/'.$url);
}

function collection($data)
{
    $collection = new Collection($data);
    return $collection;
}
