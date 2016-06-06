<?php

function view($template, $vars = [])
{
    extract($vars);

    $path = __DIR__."/../resources/views/";

    ob_start();

    require $path . "$template.view.php";

    $templateContent = ob_get_clean();

    require $path . "layout.view.php";

}

function controller($controller)
{
    $controller = $controller.'Controller';

    $file = __DIR__. "/../app/Controllers/$controller".".php";

    if (file_exists($file)){

       require $file;

    }else{

        http_response_code(404);

        return view('404');
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


