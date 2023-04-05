<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

final class IdValueObject extends IntValueObject
{
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equalsTo(IntValueObject $other): bool
    {
        return $this->value() === $other->value();
    }

    public static function from(int $value): self
    {
        return new self($value);
    }
}
