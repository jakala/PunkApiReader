<?php

namespace App\Domain\ValueObject;

use Domain\Exception\FirstBrewedException;

final class BeerFirstBrewed
{
    private \DateTime $value;

    /**
     * @throws FirstBrewedException
     */
    public function __construct(string $value)
    {
        $this->value = $this->validate($value);
    }

    public function getValue(): \Datetime
    {
        return $this->value;
    }

    /**
     * @throws FirstBrewedException
     */
    private function validate(string $datetime): \DateTime
    {
        $value = \DateTime::createFromFormat('m/Y', $datetime);
        if (is_null($value)) {
            throw new FirstBrewedException('Datetime not valid: "'.$datetime.'"');
        }

        return $value;
    }
}
