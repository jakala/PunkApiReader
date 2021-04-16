<?php
namespace App\Domain\ValueObject;

class Food
{
    private string $food;

    public function __construct(string $food)
    {
        $this->food = str_replace(' ', '_', $food);
    }
    public function getFood(): string
    {
        return $this->food;
    }
}