<?php

namespace App\Application\Command;

use App\Domain\ValueObject\Food;

/**
 * Class CreateFoodQuery.
 */
final class FoodQuery
{
    private Food $food;

    /**
     * CreateFoodQuery constructor.
     */
    public function __construct(Food $food)
    {
        $this->food = $food;
    }

    public function food(): Food
    {
        return $this->food;
    }
}
