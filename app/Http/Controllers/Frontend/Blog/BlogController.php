<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Postcategory;
use App\Traits\ManageBlog;

class BlogController extends Controller
{
    use ManageBlog;

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->take(5)->get();
        $postcategories = Postcategory::get();

        return view('layouts.blog.index', compact('posts', 'postcategories'));
    }

    public function showContent($post_slug)
    {
        $path = explode('/', $post_slug);
        $slug = array_pop($path);
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return view(
                'layouts.blog.posts.default',
                compact(
                    'post',
                )
            );
        } else {
            $postcategory = Postcategory::where('slug', $slug)->first();
            $subcategories = $postcategory->subcategories;
            $posts = Post::where('postcategory_id', $postcategory->id)->get();

            if ($postcategory) {
                return view(
                    'layouts.blog.postcategories.default',
                    compact(
                        'postcategory',
                        'subcategories',
                        'posts',
                    )
                );
            }

            return view('layouts.404');
        }
    }
}
