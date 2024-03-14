<?php

namespace App\LeetCode\LC_119_Pascals_Triangle_II;

class Solution
{
    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    public function getRow($rowIndex)
    {
        $row = [1];

        if ($rowIndex == 0) {
            return $row;
        }

        $row[] = 1;

        if ($rowIndex == 1) {
            return $row;
        }

        for ($i = 2; $i <= $rowIndex; $i++) {
            $newRow = [1];

            for ($j = 1; $j < $i; $j++) {
                $newRow[] = $row[$j - 1] + $row[$j];
            }

            $newRow[] = 1;
            $row = $newRow;
        }

        return $row;
    }
}
