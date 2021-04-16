<?php
namespace App\Domain\ValueObject;

final class BeerId
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }
}