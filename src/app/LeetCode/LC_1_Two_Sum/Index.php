<?php

namespace App\LeetCode\LC_1_Two_Sum;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();
        $result = $solution->twoSum([2, 7, 11, 15], 9);
        print_r($result);
        brX2();

        echo $this->makeLink("https://leetcode.com/problems/two-sum/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
