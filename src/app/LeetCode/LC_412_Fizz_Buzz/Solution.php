<?php

namespace App\LeetCode\LC_412_Fizz_Buzz;

class Solution
{
    /**
     * @param int $n
     * @return String[]
     */
    public function fizzBuzz(int $n): array
    {
        $res = [];
        for ($i = 1; $i <= $n; $i++) {
            if (0 == $i % 3 + $i % 5) {
                $res[] = "FizzBuzz";
            } elseif (0 == $i % 3) {
                $res[] = "Fizz";
            } elseif (0 == $i % 5) {
                $res[] = "Buzz";
            } else {
                $res[] = "$i";
            }
        }
        return $res;
    }
}
