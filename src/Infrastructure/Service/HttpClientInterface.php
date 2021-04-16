<?php
namespace App\Infrastructure\Service;

use App\Domain\ValueObject\Food;

interface HttpClientInterface
{
    public function searchByCriteria(Food $food): array;
}