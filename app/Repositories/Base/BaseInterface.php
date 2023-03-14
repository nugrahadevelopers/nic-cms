<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function find($id);
    public function create(array $data);
    public function update(Model $model, array $data);
    public function delete(Model $model);
    public function updateOrCreate(array $reference, array $data);
}
