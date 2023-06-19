<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'img'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
