<?php

namespace App\Http\Resources\Resource\Postcategory;

use Illuminate\Http\Resources\Json\JsonResource;

class PostcategorySelectOptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return new PostcategoryOptionResource($this);
    }
}
