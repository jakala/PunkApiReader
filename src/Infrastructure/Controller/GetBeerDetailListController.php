<?php
namespace App\Infrastructure\Controller;

use App\Application\Handler\GetBeerListFromApiHandler;
use App\Application\Response\BeerDetailListResponse;
use App\Application\Service\CreateFoodQuery;
use App\Application\Service\GetBeerListService;
use App\Domain\ValueObject\Food;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetBeerDetailListController
{
    private GetBeerListService $service;

    public function __construct(GetBeerListService $service)
    {
        $this->service = $service;
    }
    public function __invoke(Request $request)
    {
        $foodRequest = new CreateFoodQuery($request->get('food'));
        $beerList = $this->service->__invoke($foodRequest);
        $response = new BeerDetailListResponse($beerList);
        return new JsonResponse($response);

    }
}