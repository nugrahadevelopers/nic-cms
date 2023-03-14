<?php

namespace Modules\Blog\Observers\Post;

use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Post;

class PostObserver
{
    public function creating(Post $param)
    {
        $param->seo_type = 'article';
        $param->seo_site_name = config('app.name');
        $param->created_by = Auth::user()->id;
    }

    public function updating(Post $param)
    {
        $param->updated_by = Auth::user()->id;
    }
}
