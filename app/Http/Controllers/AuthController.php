<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    // REGISTER

    public function register(Request $request){
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

    $user = user::create([
        'name' => $request->name,
        'email' => $request ->email,
        'password' => Hash::make($request -> password),
        'role' => $request->role ?? 'viewer'
    ]);
    return response() -> json(['messge' => 'User Created']);


    }

    // LOGIN

    public function login(Request $request){
        if(!Auth::attempt($request ->only('email', 'password'))){
            return response() -> json(['message' => 'Invalid credentials'], 404);

        }
        $user = Auth::user();
        $token = $user ->createToken('api-token')->plainTextToken;

        return response() -> json([
            'token' => $token
        ]);
    }

    // LOGOUT 

    public function logout(Request $request){
        $request -> user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }


}
