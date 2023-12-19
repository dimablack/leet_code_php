<?php


namespace App\LeetCode\LC_2_Add_Two_Numbers;

use App\LeetCode\ListNode;

class Solution
{


    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2)
    {
        $startList = new ListNode();
        $cur = $startList;

        $carry = 0;
        while ($l1 || $l2 || $carry) {
            $dig1 = $l1 ? $l1->val : 0;
            $dig2 = $l2 ? $l2->val : 0;

            $val = $dig1 + $dig2 + $carry;
            $carry = (int)($val / 10);
            $val = $val % 10;

            $cur->next = new ListNode($val);
            $cur = $cur->next;
            $l1 = $l1 ? $l1->next : null;
            $l2 = $l2 ? $l2->next : null;
        }

        return $startList->next;
    }
}
