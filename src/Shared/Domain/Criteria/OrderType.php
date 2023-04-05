<?php

declare(strict_types=1);

namespace Shared\Domain\Criteria;

use InvalidArgumentException;
use Shared\Domain\ValueObject\Enum;

/**
 * @method static OrderType asc()
 * @method static OrderType desc()
 */
final class OrderType extends Enum
{
    const ASC = 'asc';

    const DESC = 'desc';

    protected function throwExceptionForInvalidValue($value)
    {
        throw new InvalidArgumentException($value);
    }
}
