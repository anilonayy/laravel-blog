<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['author'];


    public function author() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
