<?php

namespace App\Domain\ValueObject;

use App\Domain\ValueObject\Common\StringValueObject;
use App\Domain\Exception\ImageUrlException;

final class BeerImageUrl extends StringValueObject
{
    const BASE_URI = 'images.punkapi.com';

    /**
     * @throws ImageUrlException
     */
    public function __construct(string $value)
    {
        $this->validateUrl($value);
        parent::__construct($value);
    }

    /**
     * @throws ImageUrlException
     */
    private function validateUrl(string $url): void
    {
        $components = parse_url($url);
        if (empty($components['host']) || self::BASE_URI !== $components['host']) {
            throw new ImageUrlException('url "'.$url.'" is not from PunkApi', 400);
        }
    }
}
