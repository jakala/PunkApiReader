<?php

namespace App\Application\Service;

final class CreateFoodQuery
{
    private string $food;

    public function __construct(string $food)
    {
        $this->food = $food;
    }

    public function food(): string
    {
        return $this->food;
    }
}
