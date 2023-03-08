<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();

        return response()->json($users);
    }

    public function store(Request $request)
    {
        $user = $this->userService->createUser($request);

        return response()->json($user, 200);
    }

    public function show($id)
    {
        $user = $this->userService->getUserById($id);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->updateUser($request, $id);

        if ($user) {
        } else {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }
    }

    public function destroy($id)
    {
        $user = $this->userService->deleteUser($id);

        if ($user) {
            return response()->json(['message' => 'Xóa người dùng thành công']);
        } else {
            return response()->json(['message' => 'Không tìm thấy người dùng'], 404);
        }
    }
}
