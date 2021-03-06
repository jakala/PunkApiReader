<?php

namespace App\Domain\ValueObject;

use App\Domain\Exception\ImageUrlException;
use App\Domain\ValueObject\Common\StringValueObject;

final class BeerImageUrl extends StringValueObject
{
    const BASE_URI = 'images.punkapi.com';

    /**
     * @throws ImageUrlException
     */
    public function __construct(string $value = null)
    {
        $this->validateUrl($value);
        parent::__construct($value);
    }

    /**
     * @throws ImageUrlException
     */
    private function validateUrl(string $url = null): void
    {
        $components = parse_url($url);
        if(!is_null($url)) {
            if (empty($components['host']) || self::BASE_URI !== $components['host']) {
                throw new ImageUrlException('url "' . $url . '" is not from PunkApi', 400);
            }
        }
    }
}
