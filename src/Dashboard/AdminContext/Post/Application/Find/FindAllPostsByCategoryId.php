<?php

declare(strict_types=1);

namespace DashboardContext\Post\Application\Find;

use DashboardContext\Post\Domain\Contract\PostRepository;
use Shared\Domain\ValueObject\IdValueObject;

final class FindAllPostsByCategoryId
{
    public function __construct(private readonly PostRepository $repository)
    {
    }

    public function __invoke(string $id)
    {
        $categeoId = new IdValueObject((int) $id);

        return $this->repository->findAllPostsByCategoryId($categeoId);
    }
}
