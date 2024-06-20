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

    protected function printResult($result, $expectedOutput): void
    {
        echo "<pre>Result:" . $this->formatVariable($result) . "</pre>";
        echo "<pre>Expected Output:" . $this->formatVariable($expectedOutput) . "</pre>";
        echo "<br>";
        echo "Test : ";
        if ($this->areEqual($result, $expectedOutput)) {
            echo "<span style='background-color: #4CAF50; color: white; padding: 1px 5px;'>Passed</span>";
        } else {
            echo "<span style='background-color: #f44336; color: white; padding: 1px 5px;'>Failed</span>";
        }
        br();
        line_divider();
    }

    private function formatVariable($variable): string
    {
        if (is_array($variable)) {
            return $this->formatArray($variable);
        } elseif (is_bool($variable)) {
            return $variable ? 'true' : 'false';
        } elseif (is_null($variable)) {
            return 'null';
        } else {
            return htmlspecialchars(var_export($variable, true));
        }
    }

    private function areEqual($a, $b): bool
    {
        return $a === $b;
    }

    private function formatArray(array $array): string
    {

        $formatted = "\n[\n";
        foreach ($array as $key => $row) {
            if (is_array($row)) {
                $formatted .= "    {$key} => [ " . implode(", ", array_map(function ($item) {
                        return '"' . $item . '"';
                }, $row)) . " ],\n";
            } else {
                $formatted .= "    {$key} => " . htmlspecialchars(var_export($row, true)) . ",\n";
            }
        }
        $formatted .= "]";
        return htmlspecialchars($formatted);
    }


    protected function printArray(array $array): void
    {
        echo "<pre>" . $this->formatArray($array) . "</pre>";
    }
}
