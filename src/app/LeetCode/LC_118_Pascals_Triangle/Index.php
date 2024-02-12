<?php

namespace App\LeetCode\LC_118_Pascals_Triangle;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();
        $n = 5;
        $output = [[1], [1, 1], [1, 2, 1], [1, 3, 3, 1], [1, 4, 6, 4, 1]];
        print_r($output);
        br();
        $arr = $solution->generate($n);
        print_r($arr);
        for ($i = 0; $i < $n; $i++) {
            print_r($arr[$i]);
            br();
        }

        brX3();
        $n = 1;
        $output = [[1]];
        print_r($output);
        br();
        $arr = $solution->generate($n);
        print_r($arr);
        for ($i = 0; $i < $n; $i++) {
            print_r($arr[$i]);
            br();
        }

        brX2();

        echo $this->makeLink("https://leetcode.com/problems/pascals-triangle/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
