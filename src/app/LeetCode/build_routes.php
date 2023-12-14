<?php

$leetcodePath = __DIR__;

function buildLeetCodeLinks($path): string
{
    brX2();
    echo "<h1>List of other implemented tasks:</h1>";
    br();

    $links = '';

    if (is_dir($path)) {
        $leetcodeFolders = scandir($path);

        // Sort folders by problem number
        usort($leetcodeFolders, function ($a, $b) {
            preg_match('/(\d+)/', $a, $matchesA);
            preg_match('/(\d+)/', $b, $matchesB);
            $problemNumberA = $matchesA[1] ?? 0;
            $problemNumberB = $matchesB[1] ?? 0;
            return $problemNumberA - $problemNumberB;
        });

        foreach ($leetcodeFolders as $folder) {
            if ($folder != '.' && $folder != '..') {
                $folderPath = "$path/$folder";

                if (is_dir($folderPath)) {
                    preg_match('/(\d+)_(.+)/', $folder, $matches);
                    $problemNumber = $matches[1];
                    $problemName = str_replace('_', ' ', $matches[2]);
                    $links .= "<a href='/leetcode/$problemNumber'>$problemNumber. $problemName</a><br><br>\n";
                }
            }
        }
    }

    return $links;
}

$leetcodeLinks = buildLeetCodeLinks($leetcodePath);

echo $leetcodeLinks;
