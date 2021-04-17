<?php
namespace App\Application\Response;

use App\Domain\Entity\Beer;

/**
 * Class BeerResponse
 * @package App\Application\Response
 */
class BeerResponse implements \JsonSerializable
{
    /** @var Beer $beer */
    private Beer $beer;

    /**
     * BeerResponse constructor.
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
        ];
    }
}
