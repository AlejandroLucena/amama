<?php

declare(strict_types=1);

namespace DashboardContext\Post\Application\Find;

use DashboardContext\Post\Domain\Contract\PostRepository;
use App\Http\Resources\Resource\Post\PostResource;
use Shared\Domain\ValueObject\IdValueObject;

final class FindPostById
{
    public function __construct(private readonly PostRepository $repository)
    {
    }

    public function __invoke(string $id): PostResource
    {
        $id = IdValueObject::from((int) $id);

        return $this->repository->find($id)->resource;
    }
}
