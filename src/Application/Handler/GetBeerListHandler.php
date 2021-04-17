<?php
namespace App\Application\Handler;

use App\Application\Response\BeerListResponse;
use App\Application\Service\CreateBeerlistFromApiResponse;
use App\Application\Service\CreateFoodQuery;
use App\Domain\Repository\BeerRepositoryInterface;

/**
 * Class GetBeerListHandler
 * @package App\Application\Handler
 */
final class GetBeerListHandler
{
    /** @var BeerRepositoryInterface $repository */
    private BeerRepositoryInterface $repository;

    /** @var CreateBeerlistFromApiResponse $beerlistCreator */
    private CreateBeerlistFromApiResponse $beerListCreator;

    /**
     * GetBeerListHandler constructor.
     * @param BeerRepositoryInterface $repository
     * @param CreateBeerlistFromApiResponse $beerlistCreator
     */
    public function __construct(BeerRepositoryInterface $repository, CreateBeerlistFromApiResponse $beerlistCreator)
    {
        $this->repository = $repository;
        $this->beerListCreator = $beerlistCreator;
    }

    /**
     * @param CreateFoodQuery $food
     * @return BeerListResponse
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function __invoke(CreateFoodQuery $food) : BeerListResponse
    {
        $apiResponse = $this->repository->searchByCriteria($food);
        $beerlist = $this->beerListCreator->createBeerList($apiResponse);
        return new BeerListResponse($beerlist);
    }
}