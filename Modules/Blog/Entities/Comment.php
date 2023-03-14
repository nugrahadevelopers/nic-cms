<?php

namespace Modules\Blog\Entities;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'blog_comments';

    protected $fillable = [
        'post_id',
        'user_id',
        'parrent_id',
        'comment'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->hasMany(self::class, 'parrent_id');
    }

    public function parrent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($input) => Carbon::parse($input)->translatedFormat(config('app.date_time_format')),
        );
    }
}
