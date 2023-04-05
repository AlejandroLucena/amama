<?php

declare(strict_types=1);

namespace Shared\Domain\Bus\Event;

use DateTimeImmutable;
use RuntimeException;
use Shared\Domain\Bus\Message;
use Shared\Domain\ValueObject\IdValueObject;
use Shared\Domain\ValueObject\IntValueObject;
use Shared\Infrastructure\Bus\Event\Guard\DomainEventDataValidator;
use function Shared\Utils\date_to_string;

abstract class DomainEvent extends Message
{
    private $eventId;

    private $aggregateId;

    private $data;

    private $occurredOn;

    public function __construct(
        string $aggregateId,
        array $data = [],
        string $eventId = null,
        string $occurredOn = null
    ) {
        $eventId = $eventId ?: IntValueObject::random()->value();

        parent::__construct(new IdValueObject($eventId));

        $this->eventId = $eventId;
        DomainEventDataValidator::isValid($data, $this->rules(), get_called_class());

        $this->aggregateId = $aggregateId;
        $this->data = $data;
        $this->occurredOn = $occurredOn ?: date_to_string(new DateTimeImmutable());
    }

    abstract protected function rules(): array;

    abstract public static function eventName(): string;

    public function messageType(): string
    {
        return 'domain_event';
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function aggregateId()
    {
        return $this->aggregateId;
    }

    public function data(): array
    {
        return $this->data;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }

    public function __call($method, $args)
    {
        $attributeName = $method;
        if (0 === strpos($method, 'is')) {
            $attributeName = lcfirst(substr($method, 2));
        }

        if (0 === strpos($method, 'has')) {
            $attributeName = lcfirst(substr($method, 3));
        }

        if (isset($this->data[$attributeName])) {
            return $this->data[$attributeName];
        }

        throw new RuntimeException(sprintf('The method "%s" does not exist.', $method));
    }
}
