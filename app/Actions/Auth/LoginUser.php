<?php

namespace App\Actions\Auth;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUser
{
    public function execute(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::guard('login')->attempt($credentials)) {
            $request->session()->regenerate();
            return ['success' => true, 'message' => 'Login successful'];
        }

        return ['success' => false, 'message' => 'Invalid email or password'];
    }
}
