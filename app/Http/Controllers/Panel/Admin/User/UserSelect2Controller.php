<?php

namespace App\Http\Controllers\Panel\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserSelect2Controller extends Controller
{
    public function getSelectedRole(Request $request, User $user)
    {
        if ($request->ajax()) {
            $roles = $user->roles;
            $arr_data = new Collection();

            foreach ($roles as $role) {
                $arr_data->push(['id' => $role->id, 'text' => $role->name]);
            }

            return response()->json($arr_data);
        }
    }
}
