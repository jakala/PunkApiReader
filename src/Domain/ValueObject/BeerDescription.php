<?php
namespace App\Domain\ValueObject;

final class BeerDescription
{
    private string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function getDescription():string
    {
        return $this->description;
    }
}