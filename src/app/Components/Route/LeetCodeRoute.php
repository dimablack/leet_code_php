<?php

namespace App\Components\Route;

class LeetCodeRoute extends BaseRoute
{
    private $uri;
    protected $routes = []; // Initialize the routes property

    public function __construct()
    {
        $this->map();
    }

    // Map routes during initialization
    public function map()
    {
        $this->get('/leetcode/{id}/');
    }

    // Define a route for the GET method
    public function get($path): array
    {
        return $this->addRoute('GET', $path);
    }

    // Add a route to the routes array
    public function addRoute($methods, $path): array
    {
        $path = trim($path, '/');
        $pathRegular = preg_replace('/{id}/', '([0-9]+)', $path);
        $pathRegular = preg_quote($pathRegular, '/');
        $pathReplace = str_replace('{id}', '$1', $path);
        $action = 'run';
        $controller = 'Index';

        $route = [
            'method' => $methods,
            'path' => $path,
            'path_regular' => $pathRegular,
            'path_replace' => $pathReplace,
            'action' => $action,
            'controller' => $controller,
        ];

        return $this->routes[] = $route;
    }

    // Run the appropriate controller method based on the URI
    public function run()
    {
        $this->uri = $this->getUri();

        foreach ($this->routes as $route) {
            $id = $this->extractIdFromUri();

            $leetCodeFolder = __DIR__ . '/../../LeetCode';
            $dir_contents = scandir($leetCodeFolder);

            if ($this->scanDir($leetCodeFolder, $dir_contents, $id, $route)) {
                return true; // Exit early if the route is matched
            }
        }

        return false; // No matching route found
    }

    // Scan the LeetCode folder for the specified ID and call the corresponding controller method
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

        return false; // No matching folder found for the specified ID
    }

    // Call the specified controller method if it exists
    public function callMethodController($folder, $route): bool
    {
        $controllerName = $folder . DIRECTORY_SEPARATOR . $route['controller'] . '.php';
        if (file_exists($controllerName)) {
            require $controllerName;

            $controllerInstance = $this->instantiateController($controllerName);

            if ($this->executeControllerAction($controllerInstance, $route)) {
                return true; // Controller method executed successfully
            }
        }

        return false; // Unable to call the controller method
    }

    // Instantiate the controller class
    private function instantiateController($controllerName)
    {
        $controllerClassNamespace = $this->filePathToNamespace($controllerName);

        if (class_exists($controllerClassNamespace)) {
            return new $controllerClassNamespace();
        }

        return null;
    }

    private function filePathToNamespace($filePath, $basePath = '/app/src', $baseNamespace = 'App'): string
    {
        // Get the absolute path
        $absolutePath = realpath($filePath);

        // Remove the base path from the absolute path to get the relative path
        $relativePath = str_replace(realpath($basePath) . DIRECTORY_SEPARATOR, '', $absolutePath);

        // Replace directory separators with namespace separators
        $namespace = str_replace(DIRECTORY_SEPARATOR, '\\', $relativePath);

        // Remove the ".php" extension
        $namespace = str_replace('.php', '', $namespace);

        // Remove the leading 'app' if present
        $namespace = ltrim($namespace, 'app\\' . DIRECTORY_SEPARATOR);

        // Combine the base namespace and the calculated namespace
        return $baseNamespace . "\\" . $namespace;
    }

    // Execute the specified controller action
    private function executeControllerAction($controller, $route): bool
    {
        $actionName = $route['action'];
        if (method_exists($controller, $actionName)) {
            $segments = explode('/', $this->uri);
            array_shift($segments);
            $parameters = $segments;
            $result = call_user_func_array([$controller, $actionName], $parameters);

            if ($result !== null) {
                return true; // Controller action executed successfully
            } else {
                echo 'Controller action returned null';
            }
        } else {
            echo 'Method ' . $actionName . ' in Controller ' . get_class($controller) . ' not found';
        }

        return false; // Unable to execute controller action
    }

    // Extract the ID from the last part of the URI
    private function extractIdFromUri()
    {
        $parts = explode('/', $this->uri);
        return end($parts);
    }
}
