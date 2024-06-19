<?php

namespace App\LeetCode\LC_35_Search_Insert_Position;

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function searchInsert(array $nums, int $target): int
    {
        $l = 0;
        $r = count($nums) - 1;

        while ($l <= $r) {
            $mid = intdiv($l + $r, 2);

            if ($nums[$mid] === $target) {
                return $mid;
            } elseif ($nums[$mid] < $target) {
                $l = $mid + 1;
            } else {
                $r = $mid - 1;
            }
        }

        return $l;
    }
}
