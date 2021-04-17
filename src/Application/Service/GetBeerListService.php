<?php

namespace App\Application\Service;

use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;
use App\Domain\Repository\BeerRepositoryInterface;
use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;

final class GetBeerListService
{
    private BeerRepositoryInterface $repository;

    public function __construct(BeerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateFoodQuery $query): BeerList
    {
        $response = $this->repository->searchByCriteria($query);

        return $this->createBeerListFromResponse($response);
    }

    private function createBeerListFromResponse(array $list): BeerList
    {
        $beerList = new BeerList();
        foreach ($list as $item) {
            $beer = $this->createBeerFromItem($item);
            $beerList->addBeer($beer);
        }

        return $beerList;
    }

    private function createBeerFromItem(array $item): Beer
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
