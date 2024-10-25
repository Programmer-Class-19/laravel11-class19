<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Illuminate\Testing\Fluent\Concerns\Has;

class Post extends Model //terhubung ke tabel posts
{
    protected $fillable = ['title', 'author', 'slug', 'body'];
    //protected $table = 'nama postnya jika bukan default'; contoh = 'blog_posts';
    //protected $primaryKey = 'nama id nya jika bukan default'; contoh = 'post_id';
    use HasFactory;

    public function author(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
    
}
?>