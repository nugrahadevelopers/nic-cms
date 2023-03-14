<?php

namespace Modules\Blog\Repositories\Category;

use App\Repositories\Base\BaseRepository;
use Modules\Blog\Entities\Category;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        $data = $this->model->with('parent')
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
