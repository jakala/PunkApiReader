<?php
namespace App\Application\Service;

/**
 * Class CreateFoodQuery
 * @package App\Application\Service
 */
final class CreateFoodQuery
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
