<?php declare(strict_types=1);
namespace Solutions\Tests\Leetcode\_1;

use PHPUnit\Framework\TestCase;
use Solutions\Leetcode\_1\Solution;

final class SolutionTest extends TestCase {
    private Solution $sut;

    protected function setUp(): void {
        $this->sut = new Solution();
    }

    public function testInput1(): void {
        $nums = [2, 7, 11, 15];
        $target = 9;

        $result = $this->sut->twoSum($nums, $target);

        $this->assertEquals([0, 1], $result);
    }

    public function testInput2(): void {
        $nums = [-1, -2, -3, -4, -5];
        $target = -8;

        $result = $this->sut->twoSum($nums, $target);

        $this->assertEquals([2, 4], $result);
    }
}
