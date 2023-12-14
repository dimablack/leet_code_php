<?php

namespace App\Components\Route;

class RouteProvider
{
    public static function run()
    {
        return (new LeetCodeRoute())->run();
    }
}
