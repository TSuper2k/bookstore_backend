<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthRepository
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function getLogin($data)
    {
        $user = User::where('email', $data->email)->first();

        if (!$user) {
            return [
                'message' => 'Không tìm thấy người dùng',
                'satus' => 404
            ];
        }

        if ($user->password === md5($data->password)) {
            $accessToken = $user->createToken('authToken')->accessToken;

            return [
                'access_token' => $accessToken
            ];
        } else {
            return [
                'message' => 'Đăng nhập không thành công',
                'status' => 401
            ];
        }
    }

    public function getRegister($data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => md5($data['password']),
        ]);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'access_token' => $accessToken,
        ]);
    }

    public function getLogout()
    {
        Auth::user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }
}
