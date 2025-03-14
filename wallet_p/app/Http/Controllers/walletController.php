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
            'name'=>'required',
            'walletRole'=>'required',
            'monyToSend'=>'required|gte:0',
        ]);

        try {
            $user = User::where('email', $request->email);

            if(!($user->name == $request->name) || !$user){
                return response()->json(['error'=>'name or email are bad!']);
            }

            $walletAuth = auth()->user()->wallets()->where('walletRole', $request->walletRole)->get();
            if($walletAuth->mony < $request->monyToSend)
            {
                return response('stat')
            }
            $wallet = $user->wallets()->where('walletRole', 'principale')->get();


        } catch (Exception $e) {
            
        }
        

    }
}
