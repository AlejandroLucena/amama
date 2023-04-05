<?php

declare(strict_types=1);

namespace DashboardContext\Post\Application\Find;

use DashboardContext\Post\Domain\Contract\PostRepository;

final class FindAllPosts
{
    public function __construct(private readonly PostRepository $repository)
    {
    }

    public function __invoke()
    {
        return $this->repository->findAll()->resource;
    }
}
