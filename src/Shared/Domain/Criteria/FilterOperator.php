<?php

declare(strict_types=1);

namespace Shared\Domain\Criteria;

use InvalidArgumentException;
use Shared\Domain\ValueObject\Enum;

/**
 * @method static FilterOperator gt()
 * @method static FilterOperator lt()
 * @method static FilterOperator like()
 */
final class FilterOperator extends Enum
{
    const EQUAL = '=';

    const GT = '>';

    const LT = '<';

    const CONTAINS = 'CONTAINS';

    public static function equal(): self
    {
        return new self('=');
    }

    protected function throwExceptionForInvalidValue($value)
    {
        throw new InvalidArgumentException(sprintf('The filter <%s> is invalid', $value));
    }
}
