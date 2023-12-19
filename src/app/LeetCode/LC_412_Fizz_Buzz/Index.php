<?php

namespace App\LeetCode\LC_412_Fizz_Buzz;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();

        $result = $solution->fizzBuzz(10);

        print_r($result);
        brX2();

        echo $this->makeLink("https://leetcode.com/problems/fizz-buzz/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
