<?php

namespace App\Tests\Application\Service;

use App\Application\Service\CreateBeerFromApi;
use App\Application\Service\CreateBeerlistFromApi;
use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;
use App\Domain\Exception\ImageUrlException;
use App\Domain\Exception\FirstBrewedException;
use PHPUnit\Framework\TestCase;

class CreateBeerListFromApiTest extends TestCase
{
    /** @test */
    public function should_call_add_beer_method_from_beer_creator():void
    {
        $list = $this->getList();
        $item = $list[0];

        $beerCreator = $this->createMock(CreateBeerFromApi::class);
        $beerCreator
            ->method('createBeer')
            ->with($item);

        $beerListCreator = new CreateBeerlistFromApi($beerCreator);
        $result = $beerListCreator->createBeerList($list);

        $this->assertInstanceOf(BeerList::class, $result);
    }

    private function getList(): array
    {
        return [
            [],[]
        ];
    }

}
