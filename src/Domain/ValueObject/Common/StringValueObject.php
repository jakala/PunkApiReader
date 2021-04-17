<?php

namespace App\Domain\ValueObject\Common;

/**
 * Class StringValueObject.
 */
abstract class StringValueObject
{
    private string $value;

    /**
     * StringValueObject constructor.
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
