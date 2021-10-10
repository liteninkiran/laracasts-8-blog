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
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
