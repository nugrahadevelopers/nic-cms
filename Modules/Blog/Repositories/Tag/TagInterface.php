<?php

namespace Modules\Blog\Repositories\Tag;

use App\Repositories\Base\BaseInterface;

interface TagInterface extends BaseInterface
{
    public function all();
}
