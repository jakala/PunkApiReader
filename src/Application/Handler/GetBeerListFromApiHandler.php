<?php
namespace App\Application\Handler;

use App\Application\Response\BeerListResponse;
use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;
use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;
use App\Domain\ValueObject\Food;
use App\Infrastructure\Service\HttpClient;

class GetBeerListFromApiHandler
{
    private HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \App\Infrastructure\Exception\ClientException
     */
    public function getBeerListFromApiByFood(Food $food): BeerListResponse
    {
        $response = $this->client->searchByCriteria($food);

        $beerList = new BeerList();
        foreach($response as $item) {
            $beer = new Beer(
                new BeerId($item['id']),
                new BeerName($item['name']),
                new BeerDescription($item['description']),
                new BeerImageUrl($item['image_url']),
                new BeerTagline($item['tagline']),
                new BeerFirstBrewed($item['first_brewed'])
            );
            $beerList->addBeer($beer);
        }
        return new BeerListResponse($beerList);
    }
}