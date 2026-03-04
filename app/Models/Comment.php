<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Fillable
    protected $fillable = ['content', 'user_id', 'post_id'];
    
    // Link Post
    public function post() {
        return $this->belongsTo(Post::class);
    }

    // Link User
    public function user() {
        return $this->belongsTo(User::class);
    }
}
