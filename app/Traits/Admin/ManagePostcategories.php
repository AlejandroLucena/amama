<?php

namespace App\Traits\Admin;

use App\Http\Requests\PostcategoryRequest;
use App\Models\Postcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait ManagePostcategories
{
    use ManagePosts;

    protected function postcategoryInput(Request $request): array
    {
        return [
            'title' => $request->title,
            'slug' => $request->slug,
            'postcategory_id' => $request->postcategory,
        ];
    }

    public function storePostcategory(PostcategoryRequest $request)
    {
        try {
            DB::beginTransaction();

            $postcategory = Postcategory::create($this->postcategoryInput($request));

            DB::commit();

            $postcategory->parent()->associate($request->postcategory);
            $postcategory->save();

            session()->flash('message', ['success', __('Categoría creada satisfactoriamente')]);

            return $postcategory;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('message', ['danger', $e->getMessage()]);

            return false;
        }
    }

    public function updatePostcategory(PostcategoryRequest $request, Postcategory $postcategory)
    {
        try {
            DB::beginTransaction();

            $postcategory->fill($this->postcategoryInput($request))->save();

            DB::commit();

            $postcategory->parent()->associate($request->postcategory);
            $postcategory->save();

            session()->flash('message', ['success', __('Categoría actualizada satisfactoriamente')]);

            return $postcategory;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('message', ['danger', $e->getMessage()]);

            return false;
        }
    }

    public function remove(Postcategory $postcategory)
    {
        try {
            $postcategory->delete();

            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('message', ['danger', $e->getMessage()]);

            return false;
        }
    }

    public function checkInfiniteLoop(Postcategory $postcategory)
    {
    }
}
