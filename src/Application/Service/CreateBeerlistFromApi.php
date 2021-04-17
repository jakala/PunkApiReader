<?php

namespace App\Application\Service;

use App\Domain\Entity\BeerList;

/**
 * Class CreateBeerlistFromApiResponse
 * @package App\Application\Service
 */
class CreateBeerlistFromApi
{
    /** @var CreateBeerFromApi */
    private CreateBeerFromApi $beerCreator;

    /**
     * CreateBeerlistFromApiResponse constructor.
     * @param CreateBeerFromApi $beerCreator
     */
    public function __construct(CreateBeerFromApi $beerCreator)
    {
        $this->beerCreator = $beerCreator;
    }

    /**
     * @param array $list
     * @return BeerList
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function createBeerList(array $list): BeerList
    {
        $beerList = new BeerList();
        foreach($list as $item) {
            $beerList->addBeer($this->beerCreator->createBeer($item));
        }
        return $beerList;
    }
}