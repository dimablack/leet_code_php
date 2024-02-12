<?php

namespace App\LeetCode\LC_118_Pascals_Triangle;

class Solution
{
    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    public function generate(int $numRows)
    {
        $arr = [[1]];
        if ($numRows == 1) {
            return $arr;
        }
        $arr[] = [1, 1];
        if ($numRows == 2) {
            return $arr;
        }

        for ($i = 2; $i < $numRows; $i++) {
            $arr[$i][0] = 1;
            for ($j = 1; $j <= $i - 1; $j++) {
                $arr[$i][$j] = $arr[$i - 1][$j - 1] + $arr[$i - 1][$j];
            }
            $arr[$i][$i] = 1;
        }

        return $arr;
    }
}
