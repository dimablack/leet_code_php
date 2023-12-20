<?php

namespace App\LeetCode\LC_83_Remove_Duplicates_from_Sorted_List;

use App\LeetCode\ListNode;

class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function deleteDuplicates(ListNode $head): ListNode
    {
        $prev = $head;
        while ($prev->next !== null) {
            //skip duplicates item
            if ($prev->val == $prev->next->val) {
                $prev->next = $prev->next->next;
            } else {
                $prev = $prev->next;
            }
        }

        return $head;
    }
}
