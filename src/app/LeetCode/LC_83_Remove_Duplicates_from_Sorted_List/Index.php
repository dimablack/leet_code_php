<?php

namespace App\LeetCode\LC_83_Remove_Duplicates_from_Sorted_List;

use App\LeetCode\AbstractIndex;
use App\LeetCode\LeetCodeRouteControllerInterface;
use App\LeetCode\ListNode;

class Index extends AbstractIndex implements LeetCodeRouteControllerInterface
{
    public function run(): true
    {
        // Example usage:
        $solution = new Solution();

        // Create linked list: 1 -> 1 -> 2
        $head1 = new ListNode(1, new ListNode(1, new ListNode(2)));
        echo "Original List 1: ";
        br();
        $this->printList($head1);
        br();
        // Remove duplicates
        $head1 = $solution->deleteDuplicates($head1);
        echo "List 1 after removing duplicates: ";
        br();
        $this->printList($head1);
        brX2();
        // Create linked list: 1 -> 1 -> 2 -> 3 -> 3
        $head2 = new ListNode(1, new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(3)))));
        echo "Original List 2: ";
        br();
        $this->printList($head2);
        br();
        // Remove duplicates
        $head2 = $solution->deleteDuplicates($head2);
        echo "List 2 after removing duplicates: ";
        br();
        $this->printList($head2);

        br();
        brX2();

        echo $this->makeLink("https://leetcode.com/problems/remove-duplicates-from-sorted-list/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }

    // Helper function to print the linked list
    private function printList($head): void
    {
        $current = $head;

        while ($current !== null) {
            echo $current->val . " ";
            $current = $current->next;
        }
    }
}
