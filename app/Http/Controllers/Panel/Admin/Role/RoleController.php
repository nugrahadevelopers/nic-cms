<?php

namespace App\Http\Controllers\Panel\Admin\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Services\Role\RoleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $roleService;

    public function __construct(RoleService $roleService)
    {
        // Guard
        $this->middleware(['permission:role_show'])->only('index');
        $this->middleware(['permission:role_create'])->only(['create', 'store']);
        $this->middleware(['permission:role_update'])->only(['edit', 'update']);
        $this->middleware(['permission:role_detail'])->only('show');
        $this->middleware(['permission:role_delete'])->only('destroy');

        $this->roleService = $roleService;
    }

    public function index()
    {
        return view('panel.admin.role.index');
    }

    public function create(Request $request)
    {
        return view('panel.admin.role.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $result = $this->roleService->createRole($request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.roles.index')->with('alert', $result);
        }
    }

    public function edit(Request $request, Role $role)
    {
        return view('panel.admin.role.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $result = $this->roleService->sync($role, $request->permissions);

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.roles.index')->with('alert', $result);
        }
    }

    public function destroy(Role $role)
    {
        $result = $this->roleService->deleteRole($role);

        if ($result['success'] == false) {
            return redirect()->back()->with('alert', $result);
        } else {
            return redirect()->route('admin.roles.index')->with('alert', $result);
        }
    }
}
