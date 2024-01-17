<?php

namespace App\LeetCode\LC_88_Merge_Sorted_Array;

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    public function merge(&$nums1, $m, $nums2, $n)
    {
        $p1 = $m - 1;
        $p2 = $n - 1;
        $k = count($nums1) - 1;

        while ($p2 >= 0) {
            if ($nums1[$p1] > $nums2[$p2]) {
                $nums1[$k] = $nums1[$p1];
                $p1--;
            } else {
                $nums1[$k] = $nums2[$p2];
                $p2--;
            }
            $k--;
        }
    }

    public function merge2(&$nums1, $m, $nums2, $n)
    {
        for ($i = 0; $i < $n; $i++) {
            $nums1[$m + $i] = $nums2[$i];
        }
        sort($nums1);
    }
}
