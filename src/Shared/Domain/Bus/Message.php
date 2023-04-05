<?php

declare(strict_types=1);

namespace Shared\Domain\Bus;

use Shared\Domain\ValueObject\IntValueObject;

abstract class Message
{
    private $messageId;

    public function __construct(IntValueObject $messageId)
    {
        $this->messageId = $messageId;
    }

    public function messageId(): IntValueObject
    {
        return $this->messageId;
    }

    abstract public function messageType(): string;
}
