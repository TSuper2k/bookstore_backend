<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'access_token' => $accessToken,
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
            $accessToken = $user->createToken('authToken')->accessToken;

            File::put(storage_path('app/access_token.txt'), $accessToken);

            session()->start();
            session()->put('access_token', $accessToken);
            // $user->remember_token = $accessToken;
            // $user->save();

            return response()->json([
                'access_token' => $accessToken
            ]);
        } else {
            return response()->json([
                'message' => 'Đăng nhập không thành công'
            ], 401);
        }
    }

    public function logout()
    {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json([
            'message' => 'Đăng xuất thành công', 204
        ]);
        // $request->user()->currentAccessToken()->delete();

        // return response()->json([
        //     'message' => 'Đăng xuất thành công',
        // ]);
    }
}
