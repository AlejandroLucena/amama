<?php

declare(strict_types=1);

namespace Shared\Domain\Exception;

use Exception;

abstract class DomainError extends Exception
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;

    abstract protected function errorMessage(): string;
}
