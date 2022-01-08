<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use App\Models\Classroom;

class AuthController extends BaseController
{
    public function login(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if(!Auth::user()->hasRole('student')) {
                return $this->sendError(
                    'Login failed',
                    null,
                    401
                );
            }

            $classroom = Classroom::archive(false)->whereHas('users', function ($query) {
            return $query->where('users.id', auth()->user()->id);
            })->get();

            return $this->sendSuccess([
                'user' => new UserResource(auth()->user()),
                'classroom' => $classroom,
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
