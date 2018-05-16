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
