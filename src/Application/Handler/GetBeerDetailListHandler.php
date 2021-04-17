<?php
namespace App\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Application\Response\BeerDetailListResponse;
use App\Application\Service\CreateBeerlistFromApi;
use App\Domain\Repository\BeerRepositoryInterface;

/**
 * Class GetBeerListHandler
 * @package App\Application\Handler
 */
final class GetBeerDetailListHandler
{
    /** @var BeerRepositoryInterface $repository */
    private BeerRepositoryInterface $repository;

    /** @var CreateBeerlistFromApi $beerlistCreator */
    private CreateBeerlistFromApi $beerListCreator;

    /**
     * GetBeerListHandler constructor.
     * @param BeerRepositoryInterface $repository
     * @param CreateBeerlistFromApi $beerlistCreator
     */
    public function __construct(BeerRepositoryInterface $repository, CreateBeerlistFromApi $beerlistCreator)
    {
        $this->repository = $repository;
        $this->beerListCreator = $beerlistCreator;
    }

    /**
     * @param FoodQuery $food
     * @return BeerDetailListResponse
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function __invoke(FoodQuery $food) : BeerDetailListResponse
    {
        $apiResponse = $this->repository->searchByCriteria($food);
        $beerlist = $this->beerListCreator->createBeerList($apiResponse);
        return new BeerDetailListResponse($beerlist);
    }
}