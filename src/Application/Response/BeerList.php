<?php
namespace App\Application\Response;

use App\Domain\Entity\BeerList;

class BeerListResponse implements \JsonSerializable
{
    private BeerList $list;

    public function __construct(BeerList $list)
    {
        $this->list = $list;
    }

    public function jsonSerialize()
    {
        return $this->list->getList();
    }
}