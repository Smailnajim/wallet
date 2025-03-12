<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
class walletController extends Controller
{
    public function send(Request $request){
        $request->validate([
            'email'=>'required|uniq:users',
            'name'=>'required'
        ]);

        try {
            $user = User::where('email', $request->email);

            if(!($user->name == $request->name) || !$user){
                return response()->json(['error'=>'name or email are bad!']);
            }
            
        } catch (Exception $e) {
            
        }
        

    }
}
