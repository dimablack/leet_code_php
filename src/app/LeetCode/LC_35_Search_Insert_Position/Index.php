<?php

namespace App\LeetCode\LC_35_Search_Insert_Position;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        $solution = new Solution();

        $testCases = [
            ['nums' => [1, 3, 5, 6], 'target' => 0, 'output' => 0],
            ['nums' => [1, 3, 5, 6], 'target' => 5, 'output' => 2],
            ['nums' => [1, 3, 5, 6], 'target' => 2, 'output' => 1],
            ['nums' => [1, 3, 5, 6], 'target' => 7, 'output' => 4],
        ];

        foreach ($testCases as $key => $case) {
            echo "Test case #" . $key + 1;
            br();
            $nums = $case['nums'];
            $target = $case['target'];
            $expectedOutput = $case['output'];

            $this->printTestCase($nums, $target, $expectedOutput);

            $result = $solution->searchInsert($nums, (int)$target);
            $this->printResult($result, $expectedOutput);
        }

        echo $this->makeLink("https://leetcode.com/problems/search-insert-position/");
        $this->displaySolutionCode(Solution::class);

        return true;
    }

    private function printTestCase($nums, $target, $output): void
    {
        $this->printArray(['$nums' => $nums]);
        $this->printArray(['$target' => $target]);
        $this->printArray(['$output' => $output]);
    }
}
