<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'body',
        'published_at',
        'user_id',
        'category_id',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    // Eager load relations
    // protected $with = ['category', 'author'];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
