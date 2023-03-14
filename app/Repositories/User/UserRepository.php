<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Base\BaseRepository;

class UserRepository extends BaseRepository implements UserInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        $data = $this->model->with('roles')
            ->orderBy('created_at', 'DESC');

        if (request()->ajax()) {
            return $data;
        } else {
            return $data->get();
        }
    }
}
