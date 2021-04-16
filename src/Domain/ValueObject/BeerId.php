<?php
namespace App\Domain\ValueObject;

final class BeerId
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue():int
    {
        return $this->value;
    }
}