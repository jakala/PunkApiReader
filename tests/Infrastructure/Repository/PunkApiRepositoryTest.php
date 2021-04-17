<?php
namespace App\Tests\Infrastructure\Repository;

use App\Application\Command\FoodQuery;
use App\Infrastructure\Repository\LocalPunkApiRepository;
use PHPUnit\Framework\TestCase;

class PunkApiRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_gave_a_valid_beer_list(): void
    {
        $repository = new LocalPunkApiRepository();
        $foodQuery = new FoodQuery('meal');

        $beerList = $repository->searchByCriteria($foodQuery);

        $this->assertIsArray($beerList);
    }
}