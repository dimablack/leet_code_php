<?php


namespace App\Components\Route;

abstract class BaseRoute
{
    protected $routes;

    public function getUri(): string
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->getUri();

        foreach ($this->routes as $route) {
            $uriPattern = "/^" . $route['path_regular'] . "$/";

            if (preg_match($uriPattern, $uri)) {
                $controllerName = $route['controller'];

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    $actionName = $route['action'];

                    if (method_exists($controller, $actionName)) {
                        $segments = explode('/', $uri);
                        array_shift($segments);
                        $parameters = $segments;
                        $result = call_user_func_array([$controller, $actionName], $parameters);

                        if ($result != null) {
                            break;
                        }
                    } else {
                        echo 'Method ' . $actionName . ' in Controller ' . $controllerName . ' not found';
                    }
                } else {
                    echo 'Controller ' . $controllerName . ' not found';
                }
                return;
            }
        }
    }
}
