<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use InvalidArgumentException;

final class SlugValueObject extends StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidSlug($value);

        parent::__construct($value);
    }

    private function ensureIsValidSlug(string $value)
    {
        if (! preg_match('/^[a-z][-a-z0-9]*$/', $value)) {
            throw new InvalidArgumentException(sprintf('The slug <%s> is not valid', $value));
        }
    }

    public static function from(string $slug): self
    {
        return new self($slug);
    }
}
