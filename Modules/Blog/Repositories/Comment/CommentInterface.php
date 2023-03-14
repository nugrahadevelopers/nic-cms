<?php

namespace Modules\Blog\Repositories\Comment;

use App\Repositories\Base\BaseInterface;

interface CommentInterface extends BaseInterface
{
    public function all();
}
