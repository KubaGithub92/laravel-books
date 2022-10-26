<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Author;
// use App\Models\Category;
// use App\Models\Publisher;

class Book extends Model
{
    use HasFactory;

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class);
    // }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
