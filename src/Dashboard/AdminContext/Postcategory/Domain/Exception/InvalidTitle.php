<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Domain\Exception;

use InvalidArgumentException;

final class InvalidTitle extends InvalidArgumentException
{
    public static function reason(string $msg): InvalidTitle
    {
        return new self('Invalid Category title because '.$msg);
    }
}
