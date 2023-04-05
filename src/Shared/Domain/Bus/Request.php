<?php

declare(strict_types=1);

namespace Shared\Domain\Bus;

use Shared\Domain\ValueObject\Uuid;

abstract class Request extends Message
{
    public function requestId(): Uuid
    {
        return $this->messageId();
    }
}
