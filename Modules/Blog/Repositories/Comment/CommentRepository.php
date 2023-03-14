<?php

namespace Modules\Blog\Repositories\Comment;

use App\Repositories\Base\BaseRepository;
use Modules\Blog\Entities\Comment;

class CommentRepository extends BaseRepository implements CommentInterface
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        $data = $this->model
            ->when(request()->search, function ($query) {
                if (!is_array(request()->search)) {
                    $query->where('name', 'LIKE', '%' . request()->search . '%');
                }
            })
            ->orderBy('created_at', 'DESC');

        if (request()->ajax()) {
            return $data;
        } else {
            return $data->get();
        }
    }
}
