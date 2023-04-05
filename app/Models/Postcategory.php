<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcategory extends Model
{
    use HasFactory;

    protected $table = 'postcategories';

    public $fillable = ['title', 'slug', 'postcategory_id'];

    public function subcategories()
    {
        return $this->hasMany(Postcategory::class, 'postcategory_id');
    }

    public function parent()
    {
        return $this->belongsTo(Postcategory::class, 'postcategory_id');
    }

    public function full_url()
    {
        $postcategory = $this;
        $slug = $this->slug;
        $path = collect([]);
        $path->push($slug);
        while ($postcategory->parent != null) {
            $path->push($postcategory->parent->slug);
            $postcategory = $postcategory->parent;
        }

        return implode('/', $path->reverse()->toArray());
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
