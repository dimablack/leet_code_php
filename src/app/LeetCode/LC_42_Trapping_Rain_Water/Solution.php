<?php

namespace App\LeetCode\LC_42_Trapping_Rain_Water;

class Solution
{
    /**
     * @param Integer[] $height
     * @return Integer
     */
    public function trap(array $height): int
    {
        $n = count($height);
        if ($n == 0) {
            return 0;
        }

        $leftMax = array_fill(0, $n, 0);
        $rightMax = array_fill(0, $n, 0);

        $leftMax[0] = $height[0];
        for ($i = 1; $i < $n; $i++) {
            $leftMax[$i] = max($leftMax[$i - 1], $height[$i]);
        }

        $rightMax[$n - 1] = $height[$n - 1];
        for ($i = $n - 2; $i >= 0; $i--) {
            $rightMax[$i] = max($rightMax[$i + 1], $height[$i]);
        }

        $water = 0;
        for ($i = 0; $i < $n; $i++) {
            $water += min($leftMax[$i], $rightMax[$i]) - $height[$i];
        }

        return $water;
    }
}
