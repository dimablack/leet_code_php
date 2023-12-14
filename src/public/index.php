<?php

use App\Components\Route\RouteProvider;

require __DIR__ . '/../../vendor/autoload.php';

if (true === RouteProvider::run()) {

    require __DIR__ . '/../app/LeetCode/build_routes.php';

    die(200);
}


function br()
{
    echo ' <br>';
}

function brX2()
{
    echo ' <br><br>';
}

function brX3()
{
    echo ' <br><br><br>';
}

function line_divider()
{
    echo '<br>' . '=====================================================================================================' . '<br>';
}

function makeLink(string $url)
{
    $path = parse_url($url, PHP_URL_PATH);
    $pathParts = explode('/', trim($path, '/'));

    $problemName = end($pathParts);

    return "<a href='$url'>LeetCode Link: $problemName</a>";
}
