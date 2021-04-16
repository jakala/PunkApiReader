<?php
namespace App\Domain\ValueObject;

use Domain\Exception\ImageUrlException;

final class BeerImageUrl
{
    const BASE_URI = 'images.punkapi.com';

    private string $value;

    /**
     * @throws ImageUrlException
     */
    public function __construct(string $value)
    {
        $this->validateUrl($value);
        $this->value = $value;
    }

    public function getValue():string
    {
        return $this->value;
    }

    /**
     * @throws ImageUrlException
     */
    private function validateUrl(string $url): void
    {
        $components = parse_url($url);
        if(self::BASE_URI !== $components['host']) {
            throw new ImageUrlException('url "'.$url.'" is not from PunkApi',400);
        }
    }
}