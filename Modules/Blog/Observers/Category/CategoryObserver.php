<?php

namespace Modules\Blog\Observers\Category;

use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Category;

class CategoryObserver
{
    public function creating(Category $param)
    {
        $param->created_by = Auth::user()->id;
    }

    public function updating(Category $param)
    {
        $param->updated_by = Auth::user()->id;
    }
}
