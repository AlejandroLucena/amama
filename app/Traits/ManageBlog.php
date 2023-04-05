<?php

namespace App\Traits;

use App\Models\Post;
use App\Models\Postcategory;

trait ManageBlog
{
    protected function generatePath(Postcategory $postcategory, Post $post = null)
    {
        $array_slug = explode('/', $postcategory->full_url());
        $path = collect([]);
        foreach ($array_slug as $part) {
            $postcategory = Postcategory::where('slug', 'LIKE', '%'.$part)->first();
            $path->push([
                'slug' => $postcategory->slug,
                'label' => $postcategory->title,
            ]);
        }
        if ($post != null) {
            $path->push([
                'slug' => $post->slug,
                'label' => $post->title,
            ]);
        }

        return $path;
    }
}
