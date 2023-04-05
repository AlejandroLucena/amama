<?php

namespace App\Models;

use App\Traits\ManageFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use ManageFiles;

    public $fillable = ['title', 'slug', 'content'];

    public function postcategory()
    {
        return $this->belongsTo(Postcategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function excerpt()
    {
        return Str::words(strip_tags($this->content), 10, '...');
    }

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }

    public function full_url()
    {
        if ($this->postcategory) {
            $url = $this->postcategory->full_url().'/'.$this->slug;

            return $url;
        } else {
            return null;
        }
    }

    public function previous()
    {
        $post = Post::where('id', '<', $this->id)
            ->where('postcategory_id', $this->postcategory_id)
            ->first();
        if ($post) {
            return $post;
        }
    }

    public function next()
    {
        $post = Post::where('id', '>', $this->id)
            ->where('postcategory_id', $this->postcategory_id)
            ->first();
        if ($post) {
            return $post;
        }
    }

    public function image()
    {
        $media = $this->media()->where('media.type', Media::MEDIA_TYPE_IMAGE)->latest()->first();
        if (isset($media->url)) {
            $url = $this->getUrlFile($media->url);

            return $url;
        } else {
            return '';
        }
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
