<?php

use App\Components\Route\RouteProvider;

require __DIR__ . '/../../vendor/autoload.php';

const PFRUN = 'public function run';

if (true === RouteProvider::run()) {
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

function makeLink($url)
{
    $path = parse_url($url, PHP_URL_PATH);
    $pathParts = explode('/', trim($path, '/'));

    $problemName = end($pathParts);

    $returnLink = "<a href='$url'>LeetCode Link: $problemName</a>";

    return $returnLink;
}
