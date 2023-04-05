<?php

namespace App\Traits\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Media;
use App\Models\Post;
use App\Models\Postcategory;
use App\Traits\ManageFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

trait ManagePosts
{
    use ManageFiles;

    protected function postInput(Request $request): array
    {
        return [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'postcategory_id' => $request->postcategory,
        ];
    }

    public function generateSlug($slug)
    {
        $postcategory = Postcategory::find($this->request->get('postcategory'));
        $slug = '';
        while ($postcategory != null) {
            $slug = $postcategory->slug.'/'.$slug;
            if ($postcategory->parent) {
                $postcategory = $postcategory->parent;
            } else {
                break;
            }
        }
        $aux = explode('/', $this->request->get('slug'));
        $post_slug = array_pop($aux);

        return $slug.$post_slug;

        return $post_slug;
    }

    public function storePost(PostRequest $request)
    {
        try {
            DB::beginTransaction();

            $post = Post::create($this->postInput($request));

            DB::commit();

            $post->postcategory()->associate($request->postcategory);
            $post->save();

            if ($request->hasFile('image')) {
                $media = $this->storeFile($request, 'image', Config::get('filesystems.disks.s3.rootfolder').Media::MEDIA_TYPE_IMAGE.'/'.Media::MEDIA_OBJ_POST.'/'.sha1($post->id));
                $post->media()->attach($media);
                $post->save();
            }

            if ($request->tags) {
                foreach ($request->tags as $tag) {
                    $post->tags()->attach($tag);
                }
            }

            session()->flash('message', ['success', __('Entrada creada satisfactoriamente')]);

            return $post;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('message', ['danger', $e->getMessage()]);

            return false;
        }
    }

    public function updatePost(PostRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();

            $post->fill($this->postInput($request))->save();

            DB::commit();

            $post->postcategory()->associate($request->postcategory);
            $post->save();

            if ($request->hasFile('image')) {
                $media = $this->storeFile($request, 'image', Config::get('filesystems.disks.s3.rootfolder').Media::MEDIA_TYPE_IMAGE.'/'.Media::MEDIA_OBJ_POST.'/'.sha1($post->id));
                $post->media()->attach($media);
                $post->save();
            }

            $post->tags()->detach();
            if ($request->tags) {
                foreach ($request->tags as $tag) {
                    $post->tags()->attach($tag);
                }
            }

            session()->flash('message', ['success', __('Entrada actualizada satisfactoriamente')]);

            return $post;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('message', ['danger', $e->getMessage()]);

            return false;
        }
    }

    public function remove(Post $post)
    {
        try {
            $post->delete();

            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('message', ['danger', $e->getMessage()]);

            return false;
        }
    }

    public function checkInfiniteLoop(Post $post)
    {
    }
}
