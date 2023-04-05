<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Domain\ValueObject;

use Shared\Domain\ValueObject\StringValueObject;

final class PostcategorySlug extends StringValueObject
{
    public function __construct(public string $value)
    {
        parent::__construct($value);
    }

    public function value()
    {
        return $this->value;
    }

    public static function from(string $value)
    {
        return new self($value);
    }
}
