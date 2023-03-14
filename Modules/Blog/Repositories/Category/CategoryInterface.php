<?php

namespace Modules\Blog\Repositories\Category;

use App\Repositories\Base\BaseInterface;

interface CategoryInterface extends BaseInterface
{
    public function all();
}
