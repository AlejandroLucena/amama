<?php

declare(strict_types=1);

namespace DashboardContext\Postcategory\Infrastructure\Persistence\Eloquent;

use DashboardContext\Postcategory\Domain\Contract\PostcategoryRepository;
use DashboardContext\Postcategory\Domain\Postcategory;
use App\Http\Resources\Collection\Postcategory\PostcategoryCollection;
use App\Http\Resources\Resource\Postcategory\PostcategoryResource;
use App\Models\Postcategory as EloquentPostcategoryModel;
use Illuminate\Support\Facades\Cache;
use Shared\Domain\Criteria\Criteria;
use Shared\Domain\ValueObject\IdValueObject;

final class EloquentPostcategoryRepository implements PostcategoryRepository
{
    public function __construct(private EloquentPostcategoryModel $eloquentPostcategoryModel)
    {
    }

    public function save(Postcategory $postcategory): IdValueObject
    {
        try {
            $newPost = $this->eloquentPostcategoryModel;

            $newPost->title = $postcategory->title()->value();
            $newPost->correct = $postcategory->correct()->value();
            $newPost->questionId = $postcategory->questionId()->value();

            $newPost->save();

            Cache::forget('postcategories_all');
            Cache::rememberForever('postcategories_all', function () {
                return $this->eloquentPostcategoryModel->all();
            });
        } catch(\Exception $e) {
            dd($e);
        }

        $postcategoryId = new IdValueObject($newPost->id);

        return $postcategoryId;
    }

    public function update(IdValueObject $postcategoryId, array $data): void
    {
        try {
            $postcategory = $this->eloquentPostcategoryModel->find($postcategoryId->value());
            $postcategory->title = $data['title'];
            $postcategory->correct = $data['correct'];
            $postcategory->question_id = $data['questionId'];

            $postcategory->save();

            Cache::forget('postcategories_all');
            Cache::rememberForever('postcategories_all', function () {
                return $this->eloquentPostcategoryModel->all();
            });
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * find
     *
     * @param  mixed  $postcategoryId
     */
    public function find(IdValueObject $postcategoryId): PostcategoryResource
    {
        $id = $postcategoryId->value();
        try {
            if (! Cache::has('post_'.$id)) {
                Cache::flush();
                Cache::rememberForever('post_'.$id, function () use ($id) {
                    return new PostcategoryResource($this->eloquentPostcategoryModel->findOrFail($id));
                });
            }
            $postcategory = Cache::get('post_'.$id);

            return new PostcategoryResource($postcategory);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * findAll
     */
    public function findAll(): PostcategoryCollection
    {
        $cache = 'postcategories_all';
        try {
            if (! Cache::has($cache)) {
                Cache::rememberForever($cache, function () {
                    return $this->eloquentPostcategoryModel->get();
                });
            }
            $postcategories = Cache::get($cache);

            return new PostcategoryCollection($postcategories);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function matching(Criteria $criteria): PostcategoryCollection
    {
        try {
            return new PostcategoryCollection($this->eloquentPostcategoryModel->all());
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function findAllByCourseIdSubjectId()
    {
    }
}
