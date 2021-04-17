<?php
namespace App\Application\Command;

/**
 * Class CreateFoodQuery
 * @package App\Application\Service
 */
final class FoodQuery
{
    /** @var string $food */
    private string $food;

    /**
     * CreateFoodQuery constructor.
     * @param string $food
     */
    public function __construct(string $food)
    {
        $this->food = $food;
    }

    /**
     * @return string
     */
    public function food(): string
    {
        return $this->food;
    }
}
