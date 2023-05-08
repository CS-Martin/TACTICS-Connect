<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // Define the relationship to post
    public function post()
    {
        
        return $this->belongsTo(Post::class);
    }
}
