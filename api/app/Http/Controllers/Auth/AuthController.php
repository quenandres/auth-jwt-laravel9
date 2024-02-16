<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private $requiredCreate = [
        'name' => 'required|string',
        'email' => 'required|string|email|unique:users|max:255',
        'password' => 'required|string|confirmed|min:6'
    ];

    // create a function to register users
    public function register(Request $request)
    {
        $this->validate($request, $requiredCreate);
    }
}
