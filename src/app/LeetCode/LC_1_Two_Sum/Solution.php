<?php

namespace App\LeetCode\LC_1_Two_Sum;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target)
    {
        foreach ($nums as $key => $val) {
            $finding = $target - $val;

            unset($nums[$key]);

            if (($findingKey = array_search($finding, $nums)) !== false) {
                return [$key, $findingKey];
            }
        }
    }
}
