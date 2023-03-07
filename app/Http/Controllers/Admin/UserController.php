<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(){
        $users = $this->user->paginate(5);

        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(UserStoreRequest $request){
        $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id){
        $user = $this->user->find($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $id){
        $this->user->find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function delete($id){
        $this->user->find($id)->delete();

        return redirect()->route('user.index')->with('success', 'User has been removed.');
    }
}
