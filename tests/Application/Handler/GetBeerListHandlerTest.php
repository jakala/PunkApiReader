<?php
namespace App\Tests\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Application\Handler\GetBeerListHandler;
use App\Application\Response\BeerListResponse;
use App\Application\Service\CreateBeerlistFromApi;
use App\Domain\Repository\BeerRepositoryInterface;
use App\Domain\ValueObject\Common\StringValueObject;
use App\Domain\ValueObject\Food;
use PHPUnit\Framework\TestCase;

/**
 * Class GetBeerListHandlerTest
 * @package App\Tests\Application\Handler
 */
class GetBeerListHandlerTest extends TestCase
{
    /** @test */
    public function it_should_gave_a_valid_beer_list(): void
    {
        $food = $this->getFoodQuery();
        $repository = $this->getRepository();
        $creator = $this->getBeerCreator();

        $handler = new GetBeerListHandler($repository, $creator);
        $response = $handler->__invoke($food);
        $this->assertInstanceOf(BeerListResponse::class, $response);
    }

    private function getRepository(): BeerRepositoryInterface
    {
        $food = $this->getFoodQuery();
        $repository = $this->createMock(BeerRepositoryInterface::class);
        $repository
            ->method('searchByCriteria')
            ->with($food)
            ->willReturn([]);
        return $repository;
    }

    private function getBeerCreator(): CreateBeerlistFromApi
    {
        $creator = $this->createMock(CreateBeerlistFromApi::class);
        $creator
            ->method('createBeerList')
            ->with([]);
        return $creator;
    }

    private function getFoodQuery(): FoodQuery
    {
        return new FoodQuery(new Food('meal'));
    }
}
