<?php

namespace App\LeetCode\LC_2_Add_Two_Numbers;

use App\LeetCode\IndexBase;
use App\LeetCode\LeetCodeRouteControllerInterface;
use App\LeetCode\ListNode;

class Index extends IndexBase implements LeetCodeRouteControllerInterface
{
    public function run()
    {
        $solution = new Solution();
        $number1 = new ListNode(2, new ListNode(4, new ListNode(9)));
        $number2 = new ListNode(5, new ListNode(6, new ListNode(4, new ListNode(9))));

        $result = $solution->addTwoNumbers($number1, $number2);

        print_r($result);

        brX2();

        echo $this->makeLink("https://leetcode.com/problems/add-two-numbers/");

        $this->displaySolutionCode(Solution::class);

        return true;
    }
}
