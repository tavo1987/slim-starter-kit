<?php

function view($template, $vars = []){
    $loader = new Twig_Loader_Filesystem('resources/views/');
    $twig = new Twig_Environment($loader);
    echo $twig->render($template, $vars);
}


function controller($controller)
{
    $controller = $controller.'Controller';

    $file = __DIR__. "/../app/Controllers/$controller".".php";

    if (file_exists($file)){

       require $file;

    }else{

        http_response_code(404);

        return view('404.twig');
    }

    //require __DIR__. "/../app/Controllers/$controller"."Controller.php";

}


/**
 * @param $data
 * @return mixed|string
 */
function clean_input($data) {
    $data = trim($data);
    $data = strip_tags($data);
    $data = str_replace(
        array("\\", "¨", "º", "-"," ",
            "#", "@", "|", "!", "\"",
            "·", "$", "%", "&", "/",
            "(", ")", "?", "'", "¡",
            "¿", "[", "^", "<code>", "]",
            "+", "}", "{", "¨", "´",
            ">", "<", ";", ",", ":","Ç"),
        '',
        $data
    );

    return $data;
}


