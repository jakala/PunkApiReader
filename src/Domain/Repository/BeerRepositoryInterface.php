<?php
namespace App\Domain\Repository;

use App\Application\Service\CreateFoodQuery;
use App\Domain\Entity\BeerList;

interface BeerRepositoryInterface
{
    public function searchByCriteria(CreateFoodQuery $query): BeerList;
}