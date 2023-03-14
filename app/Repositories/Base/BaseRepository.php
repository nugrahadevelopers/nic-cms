<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        $result = $this->model->create($data);
        return $result;
    }

    public function update(Model $model, array $data)
    {
        $result = $model->update($data);
        return $result;
    }

    public function updateOrCreate(array $reference, array $data)
    {
        $result = $this->model->updateOrCreate($reference, $data);
        return $result;
    }

    public function delete(Model $model)
    {
        $result = $model->delete();
        return $result;
    }
}
