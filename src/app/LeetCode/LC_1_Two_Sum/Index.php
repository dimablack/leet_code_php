<?php

namespace App\LeetCode\LC_1_Two_Sum;

use App\LeetCode\IndexBase;
use App\LeetCode\LeetCodeRouteControllerInterface;
use ReflectionClass;

class Index extends IndexBase implements LeetCodeRouteControllerInterface
{
    public function run()
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
