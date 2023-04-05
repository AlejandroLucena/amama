<?php

declare(strict_types=1);

namespace DashboardContext\Post\Infrastructure\Persistence\Eloquent;

use DashboardContext\Post\Domain\Contract\PostRepository;
use DashboardContext\Post\Domain\Post;
use App\Http\Resources\Collection\Post\PostCollection;
use App\Http\Resources\Resource\Post\PostResource;
use App\Models\Post as EloquentPostModel;
use Illuminate\Support\Facades\Cache;
use Shared\Domain\Criteria\Criteria;
use Shared\Domain\ValueObject\IdValueObject;

final class EloquentPostRepository implements PostRepository
{
    public function __construct(private EloquentPostModel $eloquentPostModel)
    {
    }

    public function save(Post $post): IdValueObject
    {
        try {
            $newPost = $this->eloquentPostModel;

            $newPost->title = $post->title()->value();
            $newPost->correct = $post->correct()->value();
            $newPost->questionId = $post->questionId()->value();

            $newPost->save();

            Cache::forget('posts_all');
            Cache::rememberForever('posts_all', function () {
                return $this->eloquentPostModel->all();
            });
        } catch(\Exception $e) {
            dd($e);
        }

        $postId = new IdValueObject($newPost->id);

        return $postId;
    }

    public function update(IdValueObject $postId, array $data): void
    {
        try {
            $post = $this->eloquentPostModel->find($postId->value());
            $post->title = $data['title'];
            $post->correct = $data['correct'];
            $post->question_id = $data['questionId'];

            $post->save();

            Cache::forget('posts_all');
            Cache::rememberForever('posts_all', function () {
                return $this->eloquentPostModel->all();
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * find
     *
     * @param  mixed  $postId
     */
    public function find(IdValueObject $postId): PostResource
    {
        $id = $postId->value();
        try {
            if (! Cache::has('post_'.$id)) {
                Cache::flush();
                Cache::rememberForever('post_'.$id, function () use ($id) {
                    return new PostResource($this->eloquentPostModel->findOrFail($id));
                });
            }
            $post = Cache::get('post_'.$id);

            return new PostResource($post);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * findAll
     */
    public function findAll(): PostCollection
    {
        $cache = 'posts_all';
        try {
            if (! Cache::has($cache)) {
                Cache::rememberForever($cache, function () {
                    return $this->eloquentPostModel->get();
                });
            }
            $posts = Cache::get($cache);

            return new PostCollection($posts);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * findAllPostsByCourseId
     *
     * @param  mixed  $categoryId
     */
    public function FindAllPostsByCategoryId(IdValueObject $categoryId): PostCollection
    {
        $cache = 'posts_all_by_category_'.$categoryId->value();
        $id = $categoryId->value();
        try {
            if (! Cache::has($cache)) {
                Cache::rememberForever($cache, function () use ($id) {
                    dd($this->eloquentPostModel->with('categories')->where('category_id', $id)->get());

                    return $this->eloquentPostModel->with('categories')->where('category_id', $id)->get();
                });
            }
            $posts = Cache::get($cache);

            return new PostCollection($posts);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function matching(Criteria $criteria): PostCollection
    {
        try {
            return new PostCollection($this->eloquentPostModel->all());
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
