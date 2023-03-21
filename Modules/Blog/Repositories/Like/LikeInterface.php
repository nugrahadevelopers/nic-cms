<?php

namespace Modules\Blog\Repositories\Like;

use App\Repositories\Base\BaseInterface;
use Modules\Blog\Entities\Post;

interface LikeInterface extends BaseInterface
{
    public function likePost(Post $post, $userId);
    public function unlikePost(Post $post, $userId);
    public function countLikes(Post $post);
}
