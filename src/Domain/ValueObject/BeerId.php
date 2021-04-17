<?php
namespace App\Domain\ValueObject;

/**
 * Class BeerId
 * @package App\Domain\ValueObject
 */
final class BeerId
{
    /** @var int $value */
    private int $value;

    /**
     * BeerId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
