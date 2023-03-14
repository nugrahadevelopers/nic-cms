<?php

namespace Modules\Blog\Repositories\Tag;

use App\Repositories\Base\BaseRepository;
use Modules\Blog\Entities\Tag;

class TagRepository extends BaseRepository implements TagInterface
{
    public function __construct(Tag $model)
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
