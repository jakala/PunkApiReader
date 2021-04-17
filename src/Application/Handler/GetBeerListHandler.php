<?php

namespace App\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Application\Response\BeerListResponse;
use App\Application\Service\CreateBeerlistFromApi;
use App\Domain\Repository\BeerRepositoryInterface;

/**
 * Class GetBeerListHandler.
 */
final class GetBeerListHandler
{
    private BeerRepositoryInterface $repository;

    private CreateBeerlistFromApi $beerListCreator;

    /**
     * GetBeerListHandler constructor.
     */
    public function __construct(BeerRepositoryInterface $repository, CreateBeerlistFromApi $beerlistCreator)
    {
        $this->repository = $repository;
        $this->beerListCreator = $beerlistCreator;
    }

    /**
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function __invoke(FoodQuery $food): BeerListResponse
    {
        $apiResponse = $this->repository->searchByCriteria($food);
        $beerlist = $this->beerListCreator->createBeerList($apiResponse);

        return new BeerListResponse($beerlist);
    }
}
