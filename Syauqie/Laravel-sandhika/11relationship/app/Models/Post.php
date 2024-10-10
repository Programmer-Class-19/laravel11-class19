<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model  //langsung terhubung di table posts, default
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'slug', 'body'];
    // protected $table = 'blog_posts'; //cara untuk mengganti nama table dan ini yang sesuai sop

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }
}
