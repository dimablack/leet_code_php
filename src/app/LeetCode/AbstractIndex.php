<?php

namespace App\LeetCode;

use ReflectionClass;

abstract class AbstractIndex
{
    protected function displaySolutionCode($class): void
    {
        echo "<h1>Solution:</h1>";

        $reflector = new ReflectionClass($class);

        $file = $reflector->getFileName();

        echo highlight_file($file, true);
    }

    protected function makeLink(string $url): string
    {
        $path = parse_url($url, PHP_URL_PATH);

        $pathParts = explode('/', trim($path, '/'));

        $problemName = end($pathParts);

        return "<a href='$url'>LeetCode Link: $problemName</a>";
    }
}
