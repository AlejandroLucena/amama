<?php

declare(strict_types=1);

namespace DashboardContext\Post\Infrastructure\Controller;

use DashboardContext\Post\Application\Find\FindPostById;
use DashboardContext\Post\Domain\Contract\PostRepository;

final class FindPostByIdController
{
    public function __construct(
        private readonly PostRepository $repository
    ) {
    }

    public function __invoke(string $postId)
    {
        $service = new FindPostById($this->repository);

        return $service->__invoke($postId);
    }
}
