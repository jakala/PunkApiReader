<?php

namespace App\Tests\Infrastructure\Controller;

use App\Application\Command\FoodQuery;
use App\Application\Handler\GetBeerListHandler;
use App\Domain\ValueObject\Food;
use App\Infrastructure\Controller\GetBeerListController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetBeerListControllerTest extends TestCase
{
    /** @test */
    public function should_invoke_handler():void
    {
        $request = $this->getRequest();
        $handler = $this->getHandler();

        $controller = new GetBeerListController($handler);
        $response = $controller->__invoke($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    private function getHandler() : GetBeerListHandler
    {
        $handler = $this->createMock(GetBeerListHandler::class);
        $food = new FoodQuery(new Food('meal'));
        $handler
            ->method('__invoke')
            ->with($food);
        return $handler;
    }

    private function getRequest(): Request
    {
        $request = $this->createMock(Request::class);
        $request
            ->method('get')
            ->with('food')
            ->willReturn('meal');
        return $request;
    }
}
