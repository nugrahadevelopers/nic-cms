<?php

namespace Modules\Blog\Repositories\Like;

use App\Repositories\Base\BaseRepository;
use Modules\Blog\Entities\Like;
use Modules\Blog\Entities\Post;

class LikeRepository extends BaseRepository implements LikeInterface
{
    public function __construct(Like $model)
    {
        parent::__construct($model);
    }

    public function likePost(Post $post, $userId)
    {
        return $post->likes()->create([
            'user_id' => $userId
        ]);
    }

    public function unlikePost(Post $post, $userId)
    {
        return $post->likes()->where('user_id', $userId)->delete();
    }

    public function countLikes(Post $post)
    {
        return $post->likes()->count();
    }
}
