<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Validate Users Authentication
     *
     * return UserResource
     */

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return response()->json(['message' => "Invalid Login Credentials"], 422);
        }

        if (auth()->user()->status != 1) {
            return response()->json(['message'=> "You are not allow to login, contact the Administrator"], 422);
        }

        // return new UserResource(auth()->user());
        return AuthResource::make(auth()->user());
    }

    public function profile()
    {
        return new UserResource(auth()->user());
    }
}
