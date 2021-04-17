<?php

namespace App\Infrastructure\Repository;

use App\Application\Service\CreateFoodQuery;
use App\Domain\Repository\BeerRepositoryInterface;
use App\Infrastructure\Exception\ClientException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class PunkApiRepository
 * @package App\Infrastructure\Repository
 */
class PunkApiRepository implements BeerRepositoryInterface
{
    const ROOT_ENDPOINT = 'https://api.punkapi.com/v2';

    /** @var Client $client */
    private Client $client;

    /**
     * PunkApiRepository constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param CreateFoodQuery $query
     * @return array
     * @throws ClientException
     */
    public function searchByCriteria(CreateFoodQuery $query): array
    {
        $uri = self::ROOT_ENDPOINT.'/beers?'.http_build_query(['food' => $query->food()]);
        try {
            $results = $this->client->get($uri)->getBody()->getContents();
            return json_decode($results, true);
        } catch (GuzzleException $e) {
            throw new ClientException($e);
        }
    }
}
