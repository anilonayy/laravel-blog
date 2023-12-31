<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;


    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function author()
    {
        return $this->hasMany(User::class,'user_id');
    }
}
