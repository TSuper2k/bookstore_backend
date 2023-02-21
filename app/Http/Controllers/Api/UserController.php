<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json($user, 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name ?? $user->name;
            $user->email = $request->email ?? $user->email;
            $user->password = $request->password ?? $user->password;
            $user->save();
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Xóa người dùng thành công']);
        } else {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }
    }
}
