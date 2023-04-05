<?php

declare(strict_types=1);

namespace DashboardContext\Post\Domain\ValueObject;

use Shared\Domain\ValueObject\StringValueObject;

final class PostContent extends StringValueObject
{
    public function __construct(public int $value)
    {
        parent::__construct($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public static function from(int $value)
    {
        return new self($value);
    }
}
