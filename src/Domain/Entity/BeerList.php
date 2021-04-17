<?php

namespace App\Domain\Entity;

/**
 * Class BeerList.
 */
final class BeerList
{
    private array $beerList;

    /**
     * BeerList constructor.
     */
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
