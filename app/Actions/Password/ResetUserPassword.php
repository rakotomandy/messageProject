<?php

namespace App\Actions\Password;

use App\Models\Login;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetUserPassword
{
    public function execute(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:logins,email',
            'token' => 'required|string',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Verify token exists and is valid
        $passwordReset = PasswordReset::where('email', $request->email)
                                    ->where('token', $request->token)
                                    ->first();

        if (!$passwordReset) {
            return ['success' => false, 'message' => 'Invalid reset token'];
        }

        // Update password
        $user = Login::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the reset token
        $passwordReset->delete();

        return ['success' => true, 'message' => 'Password reset successfully'];
    }
}
