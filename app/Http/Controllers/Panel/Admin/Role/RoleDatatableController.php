<?php

namespace App\Http\Controllers\Panel\Admin\Role;

use App\Http\Controllers\Controller;
use App\Repositories\role\RoleInterface;
use Illuminate\Http\Request;

class RoleDatatableController extends Controller
{
    private $roleInterface;

    public function __construct(RoleInterface $roleInterface)
    {
        $this->roleInterface = $roleInterface;
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $roles = $this->roleInterface->all();
            return datatables()
                ->of($roles)
                ->addColumn('permissions', function ($role) {
                    return view('panel.admin.role.partials.role-permissions-badge', [
                        'permissions' => $role->getAllPermissions(),
                    ]);
                })
                ->addColumn('action', function ($role) {
                    return view('components.table-action', [
                        'editRoute' => route('admin.roles.edit', $role),
                        'deleteRoute' => route('admin.roles.delete', $role),
                        'deleteData' => $role->name,
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }
    }
}
