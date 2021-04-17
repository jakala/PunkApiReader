<?php

namespace App\Application\Response;

use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;

class BeerDetailListResponse implements \JsonSerializable
{
    /** @var BeerResponse[] */
    private array $list;

    public function __construct(BeerList $list)
    {
        /** @var Beer $beer */
        foreach ($list->getList() as $beer) {
            $this->list[] = new BeerDetailResponse($beer);
        }
    }

    public function jsonSerialize(): array
    {
        return $this->list;
    }
}
