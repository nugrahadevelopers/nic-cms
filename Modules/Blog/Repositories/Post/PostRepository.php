<?php

namespace Modules\Blog\Repositories\Post;

use App\Repositories\Base\BaseRepository;
use Modules\Blog\Entities\Post;

class PostRepository extends BaseRepository implements PostInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        $data = $this->model->with(['createdBy', 'comments'])
            ->withTotalVisitCount()
            ->orderBy('created_at', 'DESC');

        if (request()->ajax()) {
            return $data;
        } else {
            return $data->get();
        }
    }

    public function popular()
    {
        $data = $this->model->with(['createdBy', 'comments'])
            ->popularThisWeek();

        if (request()->ajax()) {
            return $data;
        } else {
            return $data->get();
        }
    }
}
