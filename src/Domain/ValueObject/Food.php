<?php
namespace App\Domain\ValueObject;

class Food
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = str_replace(' ', '_', $value);
    }
    public function getValue(): string
    {
        return $this->value;
    }
}