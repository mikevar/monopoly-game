<?php declare(strict_types=1);

use Mikevar\Monopoly\Exception\BadParameterException;
use Mikevar\Monopoly\Utilities\Dices;

class DicesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider badDicesConstructionsParameterValues
     */
    public function testBadDicesConstructionParameters($value): void
    {
        $this->expectException(BadParameterException::class);
        new Dices($value);
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
}
