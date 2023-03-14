<?php

namespace Modules\Blog\Services\Comment;

use App\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Comment;
use Modules\Blog\Entities\Post;
use Modules\Blog\Repositories\Comment\CommentInterface;

class BlogCommentService
{
    private $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function createComment(Post $post, array $data)
    {
        try {
            $post->comments()->create([
                'user_id' => Auth::user()->id,
                'parent_id' => $data['parent_id'] ?? null,
                'comment' => $data['comment'],
            ]);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return Helpers::sendAlert(false, $th->getMessage());
        }

        return Helpers::sendAlert(true, 'Komentar berhasil ditambahkan.');
    }

    public function updateComment(Comment $comment, array $data)
    {
        // try {
        //     $this->categoryInterface->update($category, [
        //         'name' => $data['name'],
        //         'parent_id' => $data['parent_id'] ?? null,
        //         'description' => $data['description'] ?? null,
        //     ]);
        // } catch (\Throwable $th) {
        //     info($th->getMessage());
        //     return Helpers::sendAlert(false, $th->getMessage());
        // }

        // return Helpers::sendAlert(true, 'Kategori berhasil diubah.');
    }

    public function deleteComment(Comment $comment)
    {
        // try {
        //     $this->categoryInterface->delete($category);
        // } catch (\Throwable $th) {
        //     info($th->getMessage());
        //     return Helpers::sendAlert(false, $th->getMessage());
        // }

        // return Helpers::sendAlert(true, 'Kategori berhasil dihapus.');
    }
}
