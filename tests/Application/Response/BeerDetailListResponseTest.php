<?php

namespace App\Tests\Application\Response;

use App\Application\Response\BeerDetailListResponse;
use App\Application\Response\BeerDetailResponse;
use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;
use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;
use PHPUnit\Framework\TestCase;

class BeerDetailListResponseTest extends TestCase
{
    /** @test */
    public function should_return_a_list_of_beers_in_array_format(): void
    {
        $beerList = $this->getBeerList();
        $beerListResponse = new BeerDetailListResponse($beerList);
        $result = $beerListResponse->jsonSerialize();

        $this->assertIsArray($result);
        $this->assertInstanceOf(BeerDetailResponse::class, $result[0]);
    }

    private function getBeerList(): BeerList
    {
        $beer = $this->getBeer();
        $beerList = new BeerList();
        $beerList->addBeer($beer);

        return $beerList;
    }

    private function getBeer(): Beer
    {
        return new Beer(
            new BeerId(1),
            new BeerName("beer name"),
            new BeerDescription("this is a beer Description"),
            new BeerImageUrl("https://images.punkapi.com/image.gif"),
            new BeerTagline("this is a tag"),
            new BeerFirstBrewed("4/2019")
        );
    }

}
