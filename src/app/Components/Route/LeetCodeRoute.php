<?php

namespace App\Components\Route;

class LeetCodeRoute extends BaseRoute
{
    private $uri;

    public function __construct()
    {
        $this->map();
    }

    public function map()
    {
        $this->get('/leetcode/{id}/');
    }

    public function get($path): array
    {
        return $this->addRoute('GET', $path);
    }

    public function addRoute($methods, $path): array
    {
        $path = preg_replace('/^\//', '', $path);
        $path = preg_replace('/\/$/', '', $path);
        $pathRegular = str_replace('{id}', '([0-9]+)', $path);
        $pathRegular = preg_replace('/\//', '\\/', $pathRegular);
        $pathReplace = str_replace('{id}', '$1', $path);
        $action = 'run';
        $controller = 'Index';

        return $this->routes[] = [
            'method' => $methods,
            'path' => $path,
            'path_regular' => $pathRegular,
            'path_replace' => $pathReplace,
            'action' => $action,
            'controller' => $controller,
        ];
    }

    public function run()
    {
        $this->uri = $this->getUri();

        foreach ($this->routes as $route) {
            $parts = explode('/', $this->uri);

            $id = end($parts);

            $leetCodeFolder = __DIR__ . '/../../LeetCode';
            $dir_contents = scandir($leetCodeFolder);


            return $this->scanDir($leetCodeFolder, $dir_contents, $id, $route);
        }

        return false;
    }

    public function scanDir($folder, $dir_contents, $id, $route): bool
    {
        foreach ($dir_contents as $dir) {
            if (preg_match('/LC_(\d+)_/', $dir, $matches) && isset($matches[1])) {
                $dir_number = intval($matches[1]);

                if ($dir_number == $id) {
                    return $this->callMethodController($folder . DIRECTORY_SEPARATOR . $dir, $route);
                }
            }
        }

        return false;
    }

    public function callMethodController($folder, $route): bool
    {
        $controllerName = $folder . DIRECTORY_SEPARATOR . $route['controller'] . '.php';
        if (file_exists($controllerName)) {
            require $controllerName;

            $classes = get_declared_classes();
            $class = end($classes);

            if (class_exists($class)) {
                $controller = new $class();
                $actionName = $route['action'];
                if (method_exists($controller, $actionName)) {
                    $segments = explode('/', $this->uri);
                    array_shift($segments);
                    $parameters = $segments;
                    $result = call_user_func_array([$controller, $actionName], $parameters);
                    if ($result != null) {
                        return true;
                    }
                } else {
                    echo 'Method ' . $actionName . ' in Controller ' . $controllerName . ' not found';
                    return true;
                }
            } else {
                echo 'Controller ' . $controllerName . ' not found';
                return true;
            }
        }

        return false;
    }
}
