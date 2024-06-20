<?php

namespace App\LeetCode\LC_36_Valid_Sudoku;

class Solution
{
    /**
     * @param String[][] $board
     * @return Boolean
     */
    public function isValidSudoku(array $board)
    {
        $rows = array_fill(0, 9, []);
        $cols = array_fill(0, 9, []);
        $boxes = array_fill(0, 9, []);

        foreach ($rows as $rowKey => $row) {
            foreach ($cols as $colKey => $col) {
                $num = $board[$rowKey][$colKey];
                if ($num !== '.') {
                    $boxIndex = intdiv($rowKey, 3) * 3 + intdiv($colKey, 3);

                    if (isset($cols[$colKey][$num]) || isset($rows[$rowKey][$num]) || isset($boxes[$boxIndex][$num])) {
                        return false;
                    }
                    $cols[$colKey][$num] = true;
                    $rows[$rowKey][$num] = true;
                    $boxes[$boxIndex][$num] = true;
                }
            }
        }

        return true;
    }
}
