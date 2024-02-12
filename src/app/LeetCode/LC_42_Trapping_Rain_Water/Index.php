<?php

namespace App\LeetCode\LC_42_Trapping_Rain_Water;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();
        $n = [0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1];
        $output = 6;
        print_r($n);
        br();
        print_r($output);
        br();
        print_r($solution->trap($n));

        brX3();
        $n = [4,2,0,3,2,5];
        $output = 9;
        print_r($n);
        br();
        print_r($output);
        br();
        print_r($solution->trap($n));

        brX2();

        echo $this->makeLink("https://leetcode.com/problems/trapping-rain-water/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }


}
