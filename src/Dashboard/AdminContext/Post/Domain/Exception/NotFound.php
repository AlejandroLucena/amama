<?php

declare(strict_types=1);

namespace DashboardContext\Post\Domain\Exception;

use InvalidArgumentException;
use Shared\Domain\ValueObject\IdValueObject;

final class NotFound extends InvalidArgumentException
{
    public static function withPostId(IdValueObject $id): NotFound
    {
        return new self(\sprintf('Post with id %s cannot be found.', $id->value()));
    }
}
