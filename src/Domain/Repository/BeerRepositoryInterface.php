<?php

namespace App\Domain\Repository;

use App\Application\Command\FoodQuery;

interface BeerRepositoryInterface
{
    public function searchByCriteria(FoodQuery $query): array;
}
