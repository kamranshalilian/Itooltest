<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->toArray();
        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);
        return response()->json(
            [
                "token" => $user->createToken("api token")->plainTextToken
            ]
        );
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->toArray())) {
            return response()->json(
                [
                    "message" => "dont find your user"
                ],
                401);
        }
        return response()->json(
            [
                "token" => Auth::user()->createToken("api token")->plainTextToken
            ]
        );
    }
}
