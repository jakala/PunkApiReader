<?php
namespace App\Domain\ValueObject;

final class BeerName
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue():string
    {
        return $this->value;
    }
}