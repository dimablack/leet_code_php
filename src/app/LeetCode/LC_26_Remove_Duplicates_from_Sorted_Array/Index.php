<?php

namespace App\LeetCode\LC_26_Remove_Duplicates_from_Sorted_Array;

class Index
{
    public function run()
    {
        $sol = new Solution();
        $nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
        print_r($nums);
        $res = $sol->removeDuplicates($nums);
        br();
        print_r($res);
        brX2();

        echo makeLink("https://leetcode.com/problems/remove-duplicates-from-sorted-array/");

        echo "<h1>Solution:</h1>";
        $reflector = new \ReflectionClass(Solution::class);
        $file = $reflector->getFileName();
        echo highlight_file($file, true);

        return true;
    }
}
