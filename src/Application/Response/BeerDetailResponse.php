<?php

namespace App\Application\Response;

use App\Domain\Entity\Beer;

class BeerDetailResponse implements \JsonSerializable
{
    private Beer $beer;

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
            'image_url' => $this->beer->getImageUrl()->getValue(),
            'tagline' => $this->beer->getTagline()->getValue(),
            'first_brewed' => $this->beer->getFirstBrewed()->getValue()->format('m/Y'),
        ];
    }
}
