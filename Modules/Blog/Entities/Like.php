<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    protected $table = 'blog_likes_posts';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];
}
