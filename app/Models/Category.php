<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category'];

    // 1 kategori memiliki banyak post
    public function post()
    {
        return  $this->hasMany(Post::class, 'category_id');
    }
}
