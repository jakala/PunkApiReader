<?php

namespace App\Infrastructure\Service;

use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;
use App\Domain\ValueObject\Food;
use App\Infrastructure\Exception\ClientException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpClient implements HttpClientInterface
{
    const URI = 'https://api.punkapi.com/v2';
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function searchByCriteria(Food $food): array
    {
        $uri = self::URI.'/beers?'.http_build_query(['food' => $food->getValue()]);
        try {
            $results = $this->client->get($uri)->getBody()->getContents();
            return json_decode($results, true);
        } catch (GuzzleException $e) {
            throw new ClientException($e);
        }

    }
}