<?php
namespace App\Tests\Application\Handler;

use App\Application\Command\FoodQuery;
use App\Application\Handler\GetBeerDetailListHandler;
use App\Application\Response\BeerDetailListResponse;
use App\Application\Service\CreateBeerlistFromApi;
use App\Domain\Repository\BeerRepositoryInterface;
use App\Domain\ValueObject\Food;
use PHPUnit\Framework\TestCase;

/**
 * Class GetBeerListHandlerTest
 * @package App\Tests\Application\Handler
 */
class GetBeerDetailListHandlerTest extends TestCase
{
    /** @test */
    public function it_should_gave_a_valid_beer_list(): void
    {
        $food = new FoodQuery(new Food('meal'));
        $repository = $this->createMock(BeerRepositoryInterface::class);
        $repository
            ->method('searchByCriteria')
            ->with($food)
            ->willReturn([]);
        $creator = $this->createMock(CreateBeerlistFromApi::class);
        $creator
            ->method('createBeerList')
            ->with([]);
        $handler = new GetBeerDetailListHandler($repository, $creator);
        $response = $handler->__invoke($food);
        $this->assertInstanceOf(BeerDetailListResponse::class, $response);
    }

}
