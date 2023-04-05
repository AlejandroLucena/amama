<?php

namespace App\Http\Resources\Collection\Post;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\Resource\Post\PostResource';
}
