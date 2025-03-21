<?php declare(strict_types=1);
namespace Solutions\Leetcode\_1;

final class Solution {

    function twoSum($nums, $target) {
        $seen = [];

        foreach ($nums as $i => $num) {
            $complement = $target - $num;
            if (isset($seen[$complement])) {
                return [$seen[$complement], $i];
            }
            $seen[$num] = $i;
        }

        return [];
    }
}
