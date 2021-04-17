<?php

namespace App\Application\Service;

use App\Domain\Entity\BeerList;

/**
 * Class CreateBeerlistFromApiResponse
 * @package App\Application\Service
 */
class CreateBeerlistFromApiResponse
{
    /** @var CreateBeerFromApiResponse */
    private CreateBeerFromApiResponse $beerCreator;

    /**
     * CreateBeerlistFromApiResponse constructor.
     * @param CreateBeerFromApiResponse $beerCreator
     */
    public function __construct(CreateBeerFromApiResponse $beerCreator)
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
            $beerList->add($this->beerCreator->createBeer($item));
        }
        return $beerList;
    }
}