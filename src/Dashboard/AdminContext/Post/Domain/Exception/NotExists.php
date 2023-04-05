<?php

declare(strict_types=1);

namespace DashboardContext\Post\Domain\Exception;

use Shared\Domain\Exception\DomainError;
use Shared\Domain\ValueObject\IdValueObject;

final class NotExists extends DomainError
{
    public function __construct(private readonly IdValueObject $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'post_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('Post <%s> does not exists', $this->id->value());
    }
}
