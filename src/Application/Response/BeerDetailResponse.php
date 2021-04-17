<?php
namespace App\Application\Response;

use App\Domain\Entity\Beer;

/**
 * Class BeerDetailResponse
 * @package App\Application\Response
 */
class BeerDetailResponse implements \JsonSerializable
{
    /** @var Beer $beer */
    private Beer $beer;

    /**
     * BeerDetailResponse constructor.
     * @param Beer $beer
     */
    public function __construct(Beer $beer)
    {
        $this->beer = $beer;
    }

    /**
     * @return array
     */
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
