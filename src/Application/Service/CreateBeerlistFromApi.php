<?php

namespace App\Application\Service;

use App\Domain\Entity\BeerList;

/**
 * Class CreateBeerlistFromApiResponse.
 */
class CreateBeerlistFromApi
{
    private CreateBeerFromApi $beerCreator;

    /**
     * CreateBeerlistFromApiResponse constructor.
     */
    public function __construct(CreateBeerFromApi $beerCreator)
    {
        $this->beerCreator = $beerCreator;
    }

    /**
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function createBeerList(array $list): BeerList
    {
        $beerList = new BeerList();
        foreach ($list as $item) {
            $beerList->addBeer($this->beerCreator->createBeer($item));
        }

        return $beerList;
    }
}
