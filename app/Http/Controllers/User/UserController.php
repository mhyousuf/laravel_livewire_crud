<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // $data['users'] = User::orderBy('id', 'desc')->get();

        return view('user.backend.index');
    }

    public function create()
    {
        return view('user.backend.form');
    }

    public function store(UserRequest $request)
    {
        $this->userService->create($request->validated());

        session()->flash('type', __('Storage Data Entered succesfully'));

        return to_route('user.backend.users.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('user.backend.form', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userService->update($request->validated(), $user);

        session()->flash('type', __('Storage Data Entered succesfully'));

        return to_route('user.backend.users.index');
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return response()->json(['url' => route('user.backend.users.index', compact('user'))]);

    }
}
