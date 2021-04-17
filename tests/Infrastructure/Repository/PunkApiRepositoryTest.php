<?php
namespace App\Tests\Infrastructure\Repository;

use App\Application\Service\CreateFoodQuery;
use App\Infrastructure\Repository\PunkApiRepository;
use PHPUnit\Framework\TestCase;

class PunkApiRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_gave_a_valid_beer_list(): void
    {
        $repository = new PunkApiRepository();
        $foodQuery = new CreateFoodQuery('meal');

        $beerList = $repository->searchByCriteria($foodQuery);

        $this->assertIsArray($beerList);
    }
}