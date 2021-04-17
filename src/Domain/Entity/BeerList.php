<?php
namespace App\Domain\Entity;

/**
 * Class BeerList
 * @package App\Domain\Entity
 */
final class BeerList
{
    /** @var array $beerList */
    private array $beerList;

    /**
     * BeerList constructor.
     */
    public function __construct()
    {
        $this->beerList = [];
    }

    /**
     * @param Beer $beer
     */
    public function addBeer(Beer $beer)
    {
        $this->beerList[$beer->getId()->getValue()] = $beer;
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return array_values($this->beerList);
    }
}
