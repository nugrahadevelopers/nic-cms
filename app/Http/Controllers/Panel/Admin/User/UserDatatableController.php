<?php

namespace App\Http\Controllers\Panel\Admin\User;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class UserDatatableController extends Controller
{
    private $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->userInterface->all();
            return datatables()
                ->of($users)
                ->addColumn('roles', function ($user) {
                    return view('panel.admin.user.partials.user-roles-badge', [
                        'roles' => $user->roles
                    ]);
                })
                ->addColumn('action', function ($user) {
                    return view('components.table-action', [
                        'editRoute' => route('admin.users.edit', $user),
                        'deleteRoute' => route('admin.users.delete', $user),
                        'deleteData' => $user->name,
                    ]);
                })
                ->addIndexColumn()
                ->make(true);
        }
    }
}
