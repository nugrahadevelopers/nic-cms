<?php

namespace App\Http\Controllers\Panel\Admin\Role;

use App\Http\Controllers\Controller;
use App\Repositories\role\RoleInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RoleSelect2Controller extends Controller
{
    private $roleInterface;

    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    public function select(Request $request)
    {
        if ($request->ajax()) {
            $roles = $this->roleInterface->all()->get();
            $arr_data = new Collection();

            foreach ($roles as $role) {
                $arr_data->push(['id' => $role->id, 'text' => $role->name]);
            }

            return response()->json($arr_data);
        }
    }
}
