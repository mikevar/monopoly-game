<?php

namespace Mikevar\Monopoly\Utilities;

use Mikevar\Monopoly\Exception\BadParameterException;

/**
 * Dices
 * 
 * The Dices is an object that represents both dices in Monopoly game that can
 * be rolled.
 */
class Dices
{
    /** @var int Minimum value of each dices. */
    const MIN_DICE_VALUE = 1;

    /** @var int Maximum value of each dices. */
    const MAX_DICE_VALUE = 6;

    /** @var int[] Minimum value of each dices. */
    private array $values = [1, 1];

    /**
     * @param array $values The default value of each dices.
     */
    public function __construct(array $values = [1, 1])
    {
        foreach ($values as $key => $value)
            if ($value < self::MIN_DICE_VALUE || $value > self::MAX_DICE_VALUE)
                throw new BadParameterException(
                    "Excepting value between ".self::MIN_DICE_VALUE." and ".self::MAX_DICE_VALUE.", got {$value} on dice number ".($key + 1)
                );

        $this->values = $values;
    }

    /**
     * Roll dices to get random values of it.
     * 
     * @return Dices
     */
    public function roll(): Dices
    {
        $this->values = [
            rand(self::MIN_DICE_VALUE, self::MAX_DICE_VALUE),
            rand(self::MIN_DICE_VALUE, self::MAX_DICE_VALUE),
        ];

        return $this;
    }

    /**
     * Get the sum of dices values.
     * 
     * @return int
     */
    public function getSumOfValues(): int
    {
        return array_sum($this->values);
    }

    /**
     * Check if dices has 'double' state.
     * 'Double' is when both dices reveal the same value.
     * 
     * @return bool
     */
    public function isDouble(): bool
    {
        return $this->values[0] === $this->values[1];
    }
}
