<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => md5($validatedData['password']),
        ]);

        // $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            // 'access_token' => $token,
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng'
            ], 404);
        }

        if ($user->password === md5($request->password)) {
            // $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                // 'access_token' => $token
            ]);
        } else {
            return response()->json([
                'message' => 'Đăng nhập không thành công'
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Đăng xuất thành công',
        ]);
    }
}
