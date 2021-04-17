<?php
namespace App\Domain\ValueObject\Common;

/**
 * Class StringValueObject
 * @package App\Domain\ValueObject\Common
 */
abstract class StringValueObject
{
    /** @var string $value */
    private string $value;

    /**
     * StringValueObject constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
