<?php

namespace App\LeetCode\LC_2_Add_Two_Numbers;

use App\LeetCode\ListNode;

class Index
{
    public function run()
    {
        $sol = new Solution();
        $l1 = new ListNode(2, new ListNode(4, new ListNode(9)));
        $l2 = new ListNode(5, new ListNode(6, new ListNode(4, new ListNode(9))));
        //10 407
        $res = $sol->addTwoNumbers($l1, $l2);
        print_r($res);
        brX2();

        echo makeLink("https://leetcode.com/problems/add-two-numbers/");

        echo "<h1>Solution:</h1>";
        $reflector = new \ReflectionClass(Solution::class);
        $file = $reflector->getFileName();
        echo highlight_file($file, true);

        return true;
    }
}
