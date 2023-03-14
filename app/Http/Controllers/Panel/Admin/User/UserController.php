<?php

namespace App\Http\Controllers\Panel\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware(['permission:user_show'])->only('index');
        $this->middleware(['permission:user_create'])->only(['create', 'store']);
        $this->middleware(['permission:user_update'])->only(['edit', 'update']);
        $this->middleware(['permission:user_detail'])->only('show');
        $this->middleware(['permission:user_delete'])->only('destroy');

        $this->userService = $userService;
    }

    public function index()
    {
        return view('panel.admin.user.index');
    }

    public function create(Request $request)
    {
        return view('panel.admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $result = $this->userService->createUser($request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.users.index')->with('alert', $result);
        }
    }

    public function edit(Request $request, User $user)
    {
        return view('panel.admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $result = $this->userService->updateUser($user, $request->validated());

        if ($result['success'] == false) {
            return redirect()->back()->withInput($request->all())->with('alert', $result);
        } else {
            return redirect()->route('admin.users.index')->with('alert', $result);
        }
    }

    public function destroy(User $user)
    {
        $result = $this->userService->deleteUser($user);

        if ($result['success'] == false) {
            return redirect()->back()->with('alert', $result);
        } else {
            return redirect()->route('admin.users.index')->with('alert', $result);
        }
    }
}
