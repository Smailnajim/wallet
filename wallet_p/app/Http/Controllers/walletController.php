<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class walletController extends Controller
{
    public function send(Request $request){
        $request->validate([
            'email'=>'required|uniq:users',
            'name'=>'required'
        ]);

        $user = User::where('email', $request->email);

        if(!($user->name == $request->name) || !$user){
            return response()->json(['error'=>'name or email are bad!']);
        }
    }
}
