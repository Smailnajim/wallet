<?php

namespace App\Http\Controllers\Auth;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logout successfully']);

        } catch (Exception $e) {
            return response()->json(['errort' => $e->getMessage()]);
        }
    }
}