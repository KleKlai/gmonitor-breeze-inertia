<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->sendSuccess([
                'user' => new UserResource(auth()->user()),
                'token' => Auth::user()->createToken($request->email)->plainTextToken
            ], 'Login successful');
        }
        else {
            return $this->sendError(
                'Login failed',
                null,
                401
            );
        }
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return $this->sendSuccess([], 'Logout successful');
    }
}
