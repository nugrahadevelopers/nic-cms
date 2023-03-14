<?php

namespace Modules\Blog\Repositories\Post;

use App\Repositories\Base\BaseInterface;

interface PostInterface extends BaseInterface
{
    public function all();
    public function popular();
}
