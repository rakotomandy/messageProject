<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    //

    public function checkEmail(Request $request)
    {
        $email=$request->validate([
            'email' => 'required|email|exists:logins,email',
        ]);

        // create token and send email logic here
        $token = Str::random(60);
        PasswordReset::create([
            'email' => $email['email'],
            'token' => $token
        ]);

        return response()->json(['success' => true, 'message' => 'Password reset link sent to your email', 'token' => $token, 'email' => $email['email']]);
    }

    public function resetPassword(Request $request)
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
            return response()->json(['success' => false, 'message' => 'Invalid reset token']);
        }

        // Update password
        $user = Login::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the reset token
        $passwordReset->delete();

        return response()->json(['success' => true, 'message' => 'Password reset successfully']);
    }
}
