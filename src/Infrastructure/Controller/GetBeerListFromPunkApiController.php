<?php
namespace App\Infrastructure\Controller;

use App\Application\Handler\GetBeerListFromApiHandler;
use App\Application\Response\BeerListResponse;
use App\Domain\ValueObject\Food;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetBeerListFromPunkApiController
{
    private GetBeerListFromApiHandler $handler;
    public function __construct(GetBeerListFromApiHandler $handler)
    {
        $this->handler = $handler;
    }
    public function __invoke(Request $request)
    {
        $foodString = $request->query->get('food');
        $food = new Food($foodString);
        $data =$this->handler->getBeerListFromApiByFood($food);
        $response = new BeerListResponse($data);
        return new JsonResponse($response);

    }
}