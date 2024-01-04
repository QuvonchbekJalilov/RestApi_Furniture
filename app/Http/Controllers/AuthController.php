<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        //laravel sanctum login
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $this->success('', ['token' => $user->createToken($request->email)->plainTextToken]);
    }

    public function register()
    {
    }

    public function logout()
    {
    }

    public function changePasssword(){
        
    }
    public function user(HttpRequest $request)
    {
        return $this->response(new UserResource($request->user()));
    }
}
