<?php

namespace App\LeetCode\LC_119_Pascals_Triangle_II;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();
        $n = 3;
        $output = [1,3,3,1];
        print_r($output);
        br();
        $arr = $solution->getRow($n);
        print_r($arr);
        for ($i = 0; $i < $n; $i++) {
            print_r($arr[$i]);
            br();
        }

        brX3();
        $n = 0;
        $output = [1];
        print_r($output);
        br();
        $arr = $solution->getRow($n);
        print_r($arr);
        for ($i = 0; $i < $n; $i++) {
            print_r($arr[$i]);
            br();
        }

        brX3();
        $n = 1;
        $output = [1, 1];
        print_r($output);
        br();
        $arr = $solution->getRow($n);
        print_r($arr);
        for ($i = 0; $i < $n; $i++) {
            print_r($arr[$i]);
            br();
        }

        brX2();

        echo $this->makeLink("https://leetcode.com/problems/pascals-triangle-ii/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
