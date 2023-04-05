<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Infrastructure\Controller;

use DashboardContext\Postcategory\Application\Find\FindAllPostcategories;
use DashboardContext\Postcategory\Domain\Contract\PostcategoryRepository;

final class FindAllOptionPostcategoriesController
{
    public function __construct(
        private readonly PostcategoryRepository $repository
    ) {
    }

    public function __invoke()
    {
        $service = new FindAllPostcategories($this->repository);

        return $service->__invoke(arrayMode: true);
    }
}
