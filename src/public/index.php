<?php

use App\Components\Route\RouteProvider;

require __DIR__ . '/../../vendor/autoload.php';

RouteProvider::run();

require __DIR__ . '/../app/LeetCode/build_routes.php';

function br(): void
{
    echo ' <br>';
}

function brX2(): void
{
    echo ' <br><br>';
}

function brX3(): void
{
    echo ' <br><br><br>';
}

function line_divider(): void
{
    echo '<br>' . '=========================================================================================' . '<br>';
}

