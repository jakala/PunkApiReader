<?php

namespace App\Infrastructure\Controller;

use App\Application\Response\BeerListResponse;
use App\Application\Service\CreateFoodQuery;
use App\Application\Service\GetBeerListService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetBeerListController
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
        $response = new BeerListResponse($beerList);

        return new JsonResponse($response);
    }
}
