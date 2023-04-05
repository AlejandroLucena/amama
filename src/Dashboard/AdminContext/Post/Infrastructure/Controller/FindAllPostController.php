<?php

declare(strict_types=1);

namespace DashboardContext\Post\Infrastructure\Controller;

use DashboardContext\Post\Application\Find\FindAllPosts;
use DashboardContext\Post\Domain\Contract\PostRepository;

final class FindAllPostController
{
    public function __construct(
        private readonly PostRepository $repository
    ) {
    }

    public function __invoke()
    {
        $service = new FindAllPosts($this->repository);

        return $service->__invoke();
    }
}
