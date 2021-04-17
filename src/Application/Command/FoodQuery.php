<?php

namespace App\Application\Command;

/**
 * Class CreateFoodQuery.
 */
final class FoodQuery
{
    private string $food;

    /**
     * CreateFoodQuery constructor.
     */
    public function __construct(string $food)
    {
        $this->food = $food;
    }

    public function food(): string
    {
        return $this->food;
    }
}
