<?php

declare(strict_types=1);

namespace Shared\Infrastructure\Api\Controller;

use function Lambdish\Phunctional\each;
use Shared\Domain\Bus\Command\Command;
use Shared\Domain\Bus\Command\CommandBus;
use Shared\Domain\Bus\Query\Query;
use Shared\Domain\Bus\Query\QueryBus;
use Shared\Infrastructure\Api\Exception\ApiExceptionsHttpStatusCodeMapping;

abstract class ApiController
{
    private $queryBus;

    private $commandBus;

    private $exceptionHandler;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
        $this->exceptionHandler = $exceptionHandler;

        each($this->exceptionRegistrar(), $this->exceptions());
    }

    abstract protected function exceptions(): array;

    protected function dispatch(Command $command)
    {
        $this->commandBus->dispatch($command);
    }

    protected function ask(Query $query)
    {
        return $this->queryBus->ask($query);
    }

    private function exceptionRegistrar(): callable
    {
        return function ($httpCode, $exception): void {
            $this->exceptionHandler->register($exception, $httpCode);
        };
    }
}
