<?php
namespace App\Domain\ValueObject;

final class BeerTagline
{
    private string $tagline;

    public function __construct(string $tagline)
    {
        $this->tagline = $tagline;
    }

    public function getTagline():string
    {
        return $this->tagline;
    }
}