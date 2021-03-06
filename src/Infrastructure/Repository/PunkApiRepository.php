<?php

namespace App\Infrastructure\Repository;

use App\Application\Command\FoodQuery;
use App\Domain\Repository\BeerRepositoryInterface;
use App\Infrastructure\Exception\ClientException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class PunkApiRepository.
 */
class PunkApiRepository implements BeerRepositoryInterface
{
    const ROOT_ENDPOINT = 'https://api.punkapi.com/v2';

    private Client $client;

    /**
     * PunkApiRepository constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @throws ClientException
     */
    public function searchByCriteria(FoodQuery $query): array
    {
        $uri = self::ROOT_ENDPOINT.'/beers?'.http_build_query(['food' => $query->food()->getValue()]);
        try {
            $results = $this->client->get($uri)->getBody()->getContents();

            return json_decode($results, true);
        } catch (GuzzleException $e) {
            throw new ClientException($e);
        }
    }
}
