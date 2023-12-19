<?php

namespace App\LeetCode\LC_26_Remove_Duplicates_from_Sorted_Array;

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function removeDuplicates(array &$nums): int
    {
        $l = 1;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] != $nums[$i - 1]) {
                $nums[$l] = $nums[$i];
                $l++;
            }
        }

        return $l;
    }
}
