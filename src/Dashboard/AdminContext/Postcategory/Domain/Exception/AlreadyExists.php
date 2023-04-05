<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Domain\Exception;

use Shared\Domain\ValueObject\IdValueObject;

final class AlreadyExists extends \InvalidArgumentException
{
    public static function withUserId(IdValueObject $id): AlreadyExists
    {
        return new self(\sprintf('Category with id %s already exists.', $id->value()));
    }
}
