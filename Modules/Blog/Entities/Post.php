<?php

namespace Modules\Blog\Entities;

use App\Models\User;
use Carbon\Carbon;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia, CanVisit
{
    use HasFactory, HasUuids, HasSlug, InteractsWithMedia, HasVisits;

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'post_date',
        'post_status',
        'post_comment_status',
        'seo_title',
        'seo_type',
        'seo_description',
        'seo_keyword',
        'seo_image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'post_date' => 'datetime',
        'post_comment_status' => 'boolean',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('featured_img')
            ->useFallbackPath(public_path('/assets/img/no-image-landscape.png'))
            ->useFallbackUrl(url('/assets/img/no-image-landscape.png'));
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories_posts', 'post_id', 'category_id')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_posts_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected function postDate(): Attribute
    {
        return Attribute::make(
            get: fn ($input) => Carbon::parse($input)->translatedFormat(config('app.date_time_format')),
        );
    }
}
