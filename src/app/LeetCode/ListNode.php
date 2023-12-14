<?php


namespace App\LeetCode;

class ListNode
{
    public $val = 0;
    public $next = null;

    /**
     * ListNode constructor.
     * @param int $val
     * @param null $next
     */
    public function __construct(int $val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}
