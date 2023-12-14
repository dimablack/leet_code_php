<?php

namespace App\Components\Route;

use App\Controllers\CarsController;
use App\Controllers\ToysController;

class Route extends BaseRoute
{
    public function __construct()
    {
        $this->map();
    }

    public function map()
    {
    }

    public function get($path, $controller, $action): array
    {
        return $this->addRoute('GET', $path, $controller, $action);
    }

    public function post($path, $controller, $action): array
    {
        return $this->addRoute('POST', $path, $controller, $action);
    }

    public function addRoute($methods, $path, $controller, $action): array
    {
        $path = preg_replace('/^\//', '', $path);
        $path = preg_replace('/\/$/', '', $path);
        $pathRegular = str_replace('{id}', '([0-9]+)', $path);
        $pathRegular = preg_replace('/\//', '\\/', $pathRegular);
        $pathReplace = str_replace('{id}', '$1', $path);

        return $this->routes[] = [
            'method' => $methods,
            'path' => $path,
            'path_regular' => $pathRegular,
            'path_replace' => $pathReplace,
            'action' => $action,
            'controller' => $controller,
        ];
    }
}
