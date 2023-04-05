<?php

declare(strict_types=1);

namespace DashboardContext\Post\Domain\Contract;

use DashboardContext\Post\Domain\Post;
use App\Http\Resources\Collection\Post\PostCollection;
use App\Http\Resources\Resource\Post\PostResource;
use Shared\Domain\Criteria\Criteria;
use Shared\Domain\ValueObject\IdValueObject;

interface PostRepository
{
    public function save(Post $post): IdValueObject;

    public function update(IdValueObject $postId, array $data): void;

    /**
     * find
     *
     * @param  mixed  $postId
     */
    public function find(IdValueObject $postId): PostResource;

    /**
     * findAll
     */
    public function findAll(): PostCollection;

    /**
     * findAll
     */
    public function FindAllPostsByCategoryId(IdValueObject $categoryId): PostCollection;

    /**
     * matching
     *
     * @param  mixed  $criteria
     */
    public function matching(Criteria $criteria): PostCollection;
}
