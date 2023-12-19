<?php

use App\Components\Route\RouteProvider;

require __DIR__ . '/../../vendor/autoload.php';

RouteProvider::run();

require __DIR__ . '/../app/LeetCode/build_routes.php';

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
    echo '<br>' . '=========================================================================================' . '<br>';
}
