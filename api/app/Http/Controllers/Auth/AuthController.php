<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\Auth\LoginRequest;


class AuthController extends Controller {

    // create a function to register users
    public function register(Request $request) {

        /* $validator = $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
        ]); */

        /* $request->validate([
            'name' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.'
        ]); */


        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Successfully created user!',
            'user'    => $user,
            'token'   => $token
        ], 201);
    }


    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        try {
            if( !$token = JWTAuth::attempt($credentials) ) {
                return response()->json([
                    'error' => 'invalid_credentials'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'could_not_create_token'
            ], 500);
        }

        return response()->json(compact('token'));
    }
}


