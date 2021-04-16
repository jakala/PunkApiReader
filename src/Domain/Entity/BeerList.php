<?php
namespace App\Domain\Entity;

final class BeerList
{
    private array $beerList;

    public function __construct()
    {
        $this->beerList = [];
    }

    public function addBeer(Beer $beer)
    {
        $this->beerList[$beer->getId()->getValue()] = $beer;
    }

    public function getList(): array
    {
        return array_values($this->beerList);
    }
}