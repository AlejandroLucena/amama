<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Domain\Contract;

use DashboardContext\Postcategory\Domain\Postcategory;
use App\Http\Resources\Collection\Postcategory\PostcategoryCollection;
use App\Http\Resources\Resource\Postcategory\PostcategoryResource;
use Shared\Domain\Criteria\Criteria;
use Shared\Domain\ValueObject\IdValueObject;

interface PostcategoryRepository
{
    /**
     * save
     *
     * @param  mixed  $postcategory
     */
    public function save(Postcategory $postcategory): IdValueObject;

    /**
     * update
     *
     * @param  mixed  $postcategoryId
     * @param  mixed  $data
     */
    public function update(IdValueObject $postcategoryId, array $data): void;

    /**
     * find
     *
     * @param  mixed  $postcategoryId
     */
    public function find(IdValueObject $postcategoryId): PostcategoryResource;

    /**
     * findAll
     */
    public function findAll(): PostcategoryCollection;

    /**
     * matching
     *
     * @param  mixed  $criteria
     */
    public function matching(Criteria $criteria): PostcategoryCollection;
}
