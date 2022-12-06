<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
use App\User;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'con', 'category_id','image','user_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function hastag($tagId) {
        return in_array($tagId,  $this->tags->pluck('id')->toArray());
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
