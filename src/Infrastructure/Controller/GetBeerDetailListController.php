<?php

namespace App\Infrastructure\Controller;

use App\Application\Handler\GetBeerListHandler;
use App\Application\Service\CreateFoodQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GetBeerDetailListController.
 */
class GetBeerDetailListController
{
    private GetBeerListHandler $handler;

    /**
     * GetBeerListController constructor.
     */
    public function __construct(GetBeerListHandler $handler)
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
        $foodQuery = new CreateFoodQuery($request->get('food'));
        $response = $this->handler->__invoke($foodQuery);

        return new JsonResponse($response);
    }
}
