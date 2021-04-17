<?php

namespace App\Application\Response;

use App\Domain\Entity\Beer;

/**
 * Class BeerResponse.
 */
class BeerResponse implements \JsonSerializable
{
    private Beer $beer;

    /**
     * BeerResponse constructor.
     */
    public function __construct(Beer $beer)
    {
        $this->beer = $beer;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->beer->getId()->getValue(),
            'name' => $this->beer->getName()->getValue(),
            'description' => $this->beer->getDescription()->getValue(),
        ];
    }
}
