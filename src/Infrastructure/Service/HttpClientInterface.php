<?php
namespace App\Infrastructure\Service;

use App\Domain\Entity\BeerList;
use App\Domain\ValueObject\Food;

interface HttpClientInterface
{
    public function searchByCriteria(Food $food): BeerList;
}