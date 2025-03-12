<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;


class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['error'=>'email or password false'], 401);
        }
        
        $token = $user->createToken('my-app-token')->plainTextToken;
        //

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);

    }
}
