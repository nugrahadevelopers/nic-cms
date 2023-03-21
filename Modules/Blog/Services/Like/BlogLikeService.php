<?php

namespace Modules\Blog\Services\Like;

use App\Helpers\Helpers;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\Like\LikeInterface;

class BlogLikeService
{
    private $likeInterface;

    public function __construct(LikeInterface $likeInterface)
    {
        $this->likeInterface = $likeInterface;
    }

    public function likePost(Post $post, $userId)
    {
        try {
            $this->likeInterface->likePost($post, $userId);
            $count = $this->likeInterface->countLikes($post);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendArrayReturn(false, $th->getMessage());
        }

        return Helpers::sendArrayReturn(true, 'Like berhasil diberikan.', ['likes' => $count]);
    }

    public function unlikePost(Post $post, $userId)
    {
        try {
            $this->likeInterface->unlikePost($post, $userId);
            $count = $this->likeInterface->countLikes($post);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendArrayReturn(false, $th->getMessage());
        }

        return Helpers::sendArrayReturn(true, 'Like berhasil dihapus.', ['likes' => $count]);
    }

    public function countLikes(Post $post)
    {
        try {
            $count = $this->likeInterface->countLikes($post);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendArrayReturn(false, $th->getMessage());
        }

        return Helpers::sendArrayReturn(true, 'Berhasil menghitung jumlah like.', ['likes' => $count]);
    }
}
