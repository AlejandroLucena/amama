<?php

namespace App\Http\Resources\Resource\Postcategory;

use App\Http\Resources\Collection\Postcategory\PostcategoryCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class PostcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $list = new PostcategoryCollection($this->subcategories);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'children' => [
                'count' => $list->count(),
                'list' => $list,
            ],
        ];
    }
}
