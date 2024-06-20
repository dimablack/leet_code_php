<?php

namespace App\LeetCode\LC_36_Valid_Sudoku;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();

        $testCases = [
            [
                'board' => [
                    ["5","3","9",".","7",".",".",".","."],
                    ["6",".",".","1","9","5",".",".","."],
                    [".","9","8",".",".",".",".","6","."],
                    ["8",".",".",".","6",".",".",".","3"],
                    ["4",".",".","8",".","3",".",".","1"],
                    ["7",".",".",".","2",".",".",".","6"],
                    [".","6",".",".",".",".","2","8","."],
                    [".",".",".","4","1","9",".",".","5"],
                    [".",".",".",".","8",".",".","7","9"]
                ],
                'output' => false
            ],
            [
                'board' => [
                    ["5","3",".",".","7",".",".",".","."],
                    ["6",".",".","1","9","5",".",".","."],
                    [".","9","8",".",".",".",".","6","."],
                    ["8",".",".",".","6",".",".",".","3"],
                    ["4",".",".","8",".","3",".",".","1"],
                    ["7",".",".",".","2",".",".",".","6"],
                    [".","6",".",".",".",".","2","8","."],
                    [".",".",".","4","1","9",".",".","5"],
                    [".",".",".",".","8",".",".","7","9"]
                ],
                'output' => true
            ],
            [
                'board' => [
                    ["8","3",".",".","7",".",".",".","."],
                    ["6",".",".","1","9","5",".",".","."],
                    [".","9","8",".",".",".",".","6","."],
                    ["8",".",".",".","6",".",".",".","3"],
                    ["4",".",".","8",".","3",".",".","1"],
                    ["7",".",".",".","2",".",".",".","6"],
                    [".","6",".",".",".",".","2","8","."],
                    [".",".",".","4","1","9",".",".","5"],
                    [".",".",".",".","8",".",".","7","9"]
                ],
                'output' => false
            ],
        ];

        foreach ($testCases as $key => $case) {
            echo "Test case #" . $key + 1;
            brX2();

            $board = $case['board'];
            $expectedOutput = $case['output'];

            $this->printTestCase($board);

            $result = $solution->isValidSudoku($board);
            $this->printResult($result, $expectedOutput);
        }

        echo $this->makeLink("https://leetcode.com/problems/valid-sudoku/");
        $this->displaySolutionCode(Solution::class);

        return true;
    }

    private function printTestCase($board): void
    {
        $this->printBoard($board);
        br();
    }

    private function printBoard($board): void
    {
        echo '<table border="1" style="border-collapse: collapse; text-align: center;">';
        for ($i = 0; $i < 9; $i++) {
            echo '<tr>';
            for ($j = 0; $j < 9; $j++) {
                $style = '';
                if ($j == 2 || $j == 5) {
                    $style .= 'border-right: 2px solid black;';
                }
                if ($i == 2 || $i == 5) {
                    $style .= 'border-bottom: 2px solid black;';
                }
                echo '<td style="width: 20px; height: 20px;' . $style . '">' . $board[$i][$j] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        br();
    }
}
