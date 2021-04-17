<?php

namespace App\Tests\Application\Response;

use App\Application\Response\BeerListResponse;
use App\Application\Response\BeerResponse;
use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;
use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;
use PHPUnit\Framework\TestCase;

class BeerResponseTest extends TestCase
{
    /** @test */
    public function should_return_a_beer_in_array_format(): void
    {
        $beer = $this->getBeer();
        $beerResponse = new BeerResponse($beer);
        $result = $beerResponse->jsonSerialize();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
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
