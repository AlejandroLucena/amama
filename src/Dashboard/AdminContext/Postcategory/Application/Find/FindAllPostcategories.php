<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Application\Find;

use DashboardContext\Postcategory\Domain\Contract\PostcategoryRepository;

final class FindAllPostcategories
{
    public function __construct(private readonly PostcategoryRepository $repository)
    {
    }

    public function __invoke(bool $arrayMode = false)
    {
        if ($arrayMode) {
            return $this->repository->findAll()->resource->pluck('title', 'id')->toArray();
        }

        return $this->repository->findAll()->resource;
    }
}
