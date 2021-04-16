<?php
namespace App\Tests\Application\Service;

use App\Application\Service\CreateFoodQuery;
use App\Application\Service\GetBeerListService;
use App\Domain\Entity\BeerList;
use App\Domain\Repository\BeerRepositoryInterface;
use PHPUnit\Framework\TestCase;

class GetBeerListServiceTest extends TestCase
{
    /** @test */
    public function it_should_return_a_beer_list(): void
    {
        $repository = $this->createMock(BeerRepositoryInterface::class);
        $service= new GetBeerListService($repository);

        $foodQuery = new CreateFoodQuery("meal");
        $beerList = new BeerList();
        $repository
            ->method('searchByCriteria')
            ->with($foodQuery)
            ->willReturn($beerList);

        $result = $service->__invoke($foodQuery);

        $this->assertInstanceOf(BeerList::class, $result);
    }
}