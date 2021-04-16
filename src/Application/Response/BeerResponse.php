<?php
namespace App\Application\Response;

use App\Domain\Entity\Beer;

class BeerResponse implements \JsonSerializable
{
    private Beer $beer;

    public function __construct(Beer $beer)
    {
        $this->beer = $beer;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->beer->getId(),
            'name' => $this->beer->getName(),
            'description' => $this->beer->getDescription()
        ];
    }
}