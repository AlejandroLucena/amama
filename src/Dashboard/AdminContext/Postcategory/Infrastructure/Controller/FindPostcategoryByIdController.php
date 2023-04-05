<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Infrastructure\Controller;

use DashboardContext\Postcategory\Application\Find\FindPostcategoryById;
use DashboardContext\Postcategory\Domain\Contract\PostcategoryRepository;

final class FindPostcategoryByIdController
{
    public function __construct(private readonly PostcategoryRepository $repository)
    {
    }

    public function __invoke(string $id)
    {
        $service = new FindPostcategoryById($this->repository);

        return $service->__invoke($id);
    }
}
