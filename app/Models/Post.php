<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['slug', 'title', 'description', 'image_path', 'category_id', 'user_id'];

    // Link With User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Link Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Link Comments
    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
