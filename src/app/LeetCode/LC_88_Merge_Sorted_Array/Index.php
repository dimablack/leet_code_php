<?php

namespace App\LeetCode\LC_88_Merge_Sorted_Array;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();
        $nums1 = [1, 2, 3, 0, 0, 0];
        $m = 3;
        $nums2 = [2, 5, 6];
        $n = 3;
        $output = [1, 2, 2, 3, 5, 6];

        print_r($output);
        br();
        $solution->merge($nums1, $m, $nums2, $n);

        br();
        print_r($nums1);
        brX2();

        echo $this->makeLink("https://leetcode.com/problems/merge-sorted-array/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
