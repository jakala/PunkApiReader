<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\BeerDescription;
use App\Domain\ValueObject\BeerFirstBrewed;
use App\Domain\ValueObject\BeerId;
use App\Domain\ValueObject\BeerImageUrl;
use App\Domain\ValueObject\BeerName;
use App\Domain\ValueObject\BeerTagline;

/**
 * Class Beer.
 */
final class Beer
{
    private BeerId $id;
    private BeerName $name;
    private BeerDescription $description;
    private BeerImageUrl $imageUrl;
    private BeerTagline $tagline;
    private BeerFirstBrewed $firstBrewed;

    /**
     * Beer constructor.
     */
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

    public function getId(): BeerId
    {
        return $this->id;
    }

    public function getName(): BeerName
    {
        return $this->name;
    }

    public function getDescription(): BeerDescription
    {
        return $this->description;
    }

    public function getImageUrl(): BeerImageUrl
    {
        return $this->imageUrl;
    }

    public function getTagline(): BeerTagline
    {
        return $this->tagline;
    }

    public function getFirstBrewed(): BeerFirstBrewed
    {
        return $this->firstBrewed;
    }
}
