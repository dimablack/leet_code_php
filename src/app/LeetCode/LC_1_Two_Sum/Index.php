<?php

namespace App\LeetCode\LC_1_Two_Sum;

class Index
{
    public function run()
    {
        $sol = new Solution();
        $res = $sol->twoSum([2, 7, 11, 15], 9);
        print_r($res);
        brX2();

        echo makeLink("https://leetcode.com/problems/two-sum/");

        echo "<h1>Solution:</h1>";
        $reflector = new \ReflectionClass(Solution::class);
        $file = $reflector->getFileName();
        echo highlight_file($file);

        return true;
    }
}
