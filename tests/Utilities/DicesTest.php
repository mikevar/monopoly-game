<?php declare(strict_types=1);

use Mikevar\Monopoly\Exception\BadParameterException;
use Mikevar\Monopoly\Utilities\Dices;

class DicesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider badDicesConstructionsParameterValues
     */
    public function testBadDicesConstructionParameters($values): void
    {
        $this->expectException(BadParameterException::class);
        new Dices($values);
    }

    public function badDicesConstructionsParameterValues(): array
    {
        return [
            [[0, 0]],
            [[0, 7]],
            [[7, 0]],
            [[7, 7]],
        ];
    }

    /**
     * @dataProvider sumOfValues
     */
    public function testSumOfValues($values, $result): void
    {
        $dice = new Dices($values);
        $this->assertSame($dice->getSumOfValues(), $result);
    }

    public function sumOfValues(): array
    {
        return [
            [[1, 1], 2],
            [[6, 5], 11],
            [[3, 4], 7],
            [[2, 6], 8],
        ];
    }
}
