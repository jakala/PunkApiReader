<?php
namespace App\Domain\Entity;

final class BeerList
{
    private array $beer;

    public function __construct()
    {
        $this->beer = [];
    }

    public function addBeer(Beer $beer)
    {
        $this->beer[$beer->getId()] = $beer;
    }

    public function getList(): array
    {
        return $this->beer;
    }
}