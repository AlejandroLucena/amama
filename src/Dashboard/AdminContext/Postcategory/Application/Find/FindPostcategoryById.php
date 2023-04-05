<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Application\Find;

use DashboardContext\Postcategory\Domain\Contract\PostcategoryRepository;
use App\Http\Resources\Resource\Postcategory\PostcategoryResource;
use Shared\Domain\ValueObject\IdValueObject;

final class FindPostcategoryById
{
    public function __construct(private readonly PostcategoryRepository $repository)
    {
    }

    public function __invoke(string $id): PostcategoryResource
    {
        $id = IdValueObject::from((int) $id);

        return $this->repository->find($id);
    }
}
