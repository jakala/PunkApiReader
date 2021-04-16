<?php
namespace App\Domain\ValueObject;

use Domain\Exception\FirstBrewedException;

final class BeerFirstBrewed
{
    private \DateTime $firstBrewed;

    /**
     * @throws FirstBrewedException
     */
    public function __construct(string $firstBrewed)
    {
        $value = $this->validate($firstBrewed);
        $this->firstBrewed = $value;
    }

    public function getDescription(): \Datetime
    {
        return $this->firstBrewed;
    }

    /**
     * @throws FirstBrewedException
     */
    private function validate(string $datetime) : \DateTime
    {
        $value = \DateTime::createFromFormat('m/Y', $datetime);
        if(is_null($value)) {
            throw new FirstBrewedException('Datetime not valid: "'.$datetime.'"');
        }

        return $value;
    }
}