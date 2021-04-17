<?php

namespace App\Domain\Repository;

use App\Application\Service\CreateFoodQuery;

interface BeerRepositoryInterface
{
    public function searchByCriteria(CreateFoodQuery $query): array;
}
