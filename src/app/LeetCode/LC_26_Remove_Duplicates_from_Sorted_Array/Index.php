<?php

namespace App\LeetCode\LC_26_Remove_Duplicates_from_Sorted_Array;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();
        $nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];

        print_r($nums);

        $result = $solution->removeDuplicates($nums);

        br();
        print_r($result);
        brX2();

        echo $this->makeLink("https://leetcode.com/problems/remove-duplicates-from-sorted-array/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
