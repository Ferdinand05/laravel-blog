<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'content_image', 'slug', 'category_id', 'user_id', 'author'];


    //  1 post hanya memiliki 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // 1 post hanya memiliki 1 kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
