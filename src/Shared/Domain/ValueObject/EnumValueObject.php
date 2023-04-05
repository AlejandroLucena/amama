<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject;

use function in_array;
use function Lambdish\Phunctional\reindex;
use ReflectionClass;
use Shared\Domain\Utils;
use Stringable;

abstract class EnumValueObject implements Stringable
{
    protected static array $cache = [];

    public function __construct(protected $value)
    {
        $this->ensureIsBetweenAcceptedValues($value);
    }

    abstract protected function throwExceptionForInvalidValue($value);

    public static function __callStatic(string $name, $args)
    {
        return new static(self::values()[$name]);
    }

    public static function fromString(string $value): EnumValueObject
    {
        return new static($value);
    }

    public static function values(): array
    {
        $class = static::class;

        if (! isset(self::$cache[$class])) {
            $reflected = new ReflectionClass($class);
            self::$cache[$class] = reindex(self::keysFormatter(), $reflected->getConstants());
        }

        return self::$cache[$class];
    }

    public static function randomValue()
    {
        return self::values()[array_rand(self::values())];
    }

    public static function random(): static
    {
        return new static(self::randomValue());
    }

    private static function keysFormatter(): callable
    {
        return static fn ($unused, string $key): string => Utils::toCamelCase(strtolower($key));
    }

    public function value()
    {
        return $this->value;
    }

    public function equals(EnumValueObject $other): bool
    {
        return $other == $this;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    private function ensureIsBetweenAcceptedValues($value): void
    {
        if (! in_array($value, static::values(), true)) {
            $this->throwExceptionForInvalidValue($value);
        }
    }
}
