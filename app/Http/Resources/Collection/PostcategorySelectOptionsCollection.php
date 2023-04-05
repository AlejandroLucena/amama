<?php

namespace App\Http\Resources\Collection;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostcategorySelectOptionsCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\Resource\Tags\PostcategorySelectOptionsResource';
}
