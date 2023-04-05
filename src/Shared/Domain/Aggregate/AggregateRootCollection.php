<?php

declare(strict_types=1);

namespace Shared\Domain\Aggregate;

use function Lambdish\Phunctional\reduce;
use Shared\Domain\Bus\Event\DomainEvent;
use Shared\Domain\Collection;

abstract class AggregateRootCollection extends Collection
{
    /** @return DomainEvent[] */
    public function pullDomainEvents()
    {
        return reduce($this->pullItemDomainEvents(), $this, []);
    }

    private function pullItemDomainEvents()
    {
        return function (array $accumulatedEvents, AggregateRoot $aggregateRoot) {
            return array_merge($accumulatedEvents, $aggregateRoot->pullDomainEvents());
        };
    }
}
