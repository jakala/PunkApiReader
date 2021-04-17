<?php
namespace App\Infrastructure\Controller;

use App\Application\Handler\GetBeerListHandler;
use App\Application\Response\BeerListResponse;
use App\Application\Service\CreateFoodQuery;
use App\Application\Service\GetBeerListService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GetBeerListController
 * @package App\Infrastructure\Controller
 */
class GetBeerListController
{
    /** @var GetBeerListHandler  */
    private GetBeerListHandler $handler;

    /**
     * GetBeerListController constructor.
     * @param GetBeerListHandler $handler
     */
    public function __construct(GetBeerListHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param Request $request
     * @return JsonResponse
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
