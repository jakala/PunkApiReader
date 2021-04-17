<?php

namespace App\Infrastructure\Controller;

use App\Application\Handler\GetBeerDetailListHandler;
use App\Application\Command\FoodQuery;
use App\Domain\ValueObject\Food;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GetBeerDetailListController.
 */
class GetBeerDetailListController
{
    private GetBeerDetailListHandler $handler;

    /**
     * GetBeerListController constructor.
     */
    public function __construct(GetBeerDetailListHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @return JsonResponse
     *
     * @throws \Domain\Exception\FirstBrewedException
     * @throws \Domain\Exception\ImageUrlException
     */
    public function __invoke(Request $request)
    {
        $food = new Food($request->get('food'));
        $foodQuery = new FoodQuery($food);
        $response = $this->handler->__invoke($foodQuery);

        return new JsonResponse($response);
    }
}
