<?php
namespace App\Infrastructure\Controller;

use App\Application\Handler\GetBeerListFromApiHandler;
use App\Application\Response\BeerListResponse;
use App\Application\Service\CreateFoodQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetBeerListController
{
    private GetBeerListFromApiHandler $handler;
    public function __construct(GetBeerListFromApiHandler $handler)
    {
        $this->handler = $handler;
    }
    public function __invoke(Request $request)
    {
        $foodRequest = new CreateFoodQuery($request->request->get('food'));

        $data =$this->handler->getBeerListFromApiByFood($foodRequest);
        $response = new BeerListResponse($data);
        return new JsonResponse($response);

    }
}