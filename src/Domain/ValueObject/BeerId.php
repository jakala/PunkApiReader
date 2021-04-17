<?php

namespace App\Domain\ValueObject;

/**
 * Class BeerId.
 */
final class BeerId
{
    private int $value;

    /**
     * BeerId constructor.
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
