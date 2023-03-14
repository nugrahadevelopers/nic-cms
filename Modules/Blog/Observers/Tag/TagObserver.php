<?php

namespace Modules\Blog\Observers\Tag;

use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Tag;

class TagObserver
{
    public function creating(Tag $param)
    {
        $param->created_by = Auth::user()->id;
    }

    public function updating(Tag $param)
    {
        $param->updated_by = Auth::user()->id;
    }
}
