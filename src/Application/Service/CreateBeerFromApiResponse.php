<?php

namespace App\Application\Service;

use App\Domain\Entity\Beer;
use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;

/**
 * Class CreateBeerFromApiResponse
 * @package App\Application\Service
 */
final class CreateBeerFromApiResponse
{
    /**
     * @param array $item
     * @return Beer
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function createBeer(array $item) : Beer
    {
        return new Beer(
            new BeerId($item['id']),
            new BeerName($item['name']),
            new BeerDescription($item['description']),
            new BeerImageUrl($item['image_url']),
            new BeerTagline($item['tagline']),
            new BeerFirstBrewed($item['first_brewed'])
        );
    }
}