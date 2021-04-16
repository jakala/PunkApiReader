<?php
namespace App\Application\Response;

use App\Domain\Entity\Beer;
use App\Domain\Entity\BeerList;

class BeerListResponse implements \JsonSerializable
{
    /** @var BeerResponse[] $list */
    private array $list;

    public function __construct(BeerList $list)
    {
        /** @var Beer $beer */
        foreach ($list->getList() as $beer) {
            $this->list[] = new BeerResponse($beer);
        }
    }

    public function jsonSerialize(): array
    {
        return $this->list;
    }
}