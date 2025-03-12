<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Exception;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){


            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'rolle_id' => 1,
                'password' => Hash::make($request->password),
            ]);
            
            $success['token'] = $user->createToken('user', ['app:all'])->plainTextToken;
            $success['name'] = $user->first_name . ' ' . $user->last_name ;
            $success['success'] = true;

            return response()->json($success, 200);
        
    }
}




        