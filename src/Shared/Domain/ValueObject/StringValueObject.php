<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

abstract class StringValueObject
{
    public function __construct(private string $value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value();
    }
}
