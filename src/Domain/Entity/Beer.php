<?php
namespace App\Domain\Entity;

use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;

final class Beer
{
    private BeerId $id;
    private BeerName $name;
    private BeerDescription $description;
    private BeerImageUrl $imageUrl;
    private BeerTagline $tagline;
    private BeerFirstBrewed $firstBrewed;

    public function __construct(
        BeerId $id,
        BeerName $name,
        BeerDescription $description,
        BeerImageUrl $imageUrl,
        BeerTagline $tagline,
        BeerFirstBrewed $firstBrewed
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
        $this->tagline = $tagline;
        $this->firstBrewed = $firstBrewed;
    }

    /**
     * @return BeerId
     */
    public function getId(): BeerId
    {
        return $this->id;
    }

    /**
     * @return BeerName
     */
    public function getName(): BeerName
    {
        return $this->name;
    }

    /**
     * @return BeerDescription
     */
    public function getDescription(): BeerDescription
    {
        return $this->description;
    }

    /**
     * @return BeerImageUrl
     */
    public function getImageUrl(): BeerImageUrl
    {
        return $this->imageUrl;
    }

    /**
     * @return BeerTagline
     */
    public function getTagline(): BeerTagline
    {
        return $this->tagline;
    }

    /**
     * @return BeerFirstBrewed
     */
    public function getFirstBrewed(): BeerFirstBrewed
    {
        return $this->firstBrewed;
    }


}