<?php

namespace App\Actions\Auth;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function execute(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:logins,email',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $user = Login::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return ['success' => true, 'message' => 'Signup successful'];
    }
}
