<?php

namespace App\Actions\Password;

use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * CheckEmailForReset Action
 * 
 * This is an ACTION class that contains the business logic for checking an email
 * and creating a password reset token. Actions help separate business logic from controllers.
 * 
 * HOW IT WORKS WITH CONTROLLER:
 * 1. Controller receives HTTP request
 * 2. Controller calls this action via dependency injection
 * 3. Action handles the business logic (validation, token creation, database operations)
 * 4. Action returns result to controller
 * 5. Controller formats HTTP response
 * 
 * BENEFITS:
 * - Controllers stay thin (only handle HTTP concerns)
 * - Business logic is reusable across different controllers
 * - Easier to test business logic separately
 * - Follows Single Responsibility Principle
 */
class CheckEmailForReset
{
    /**
     * Execute the password reset email check logic
     * 
     * @param Request $request The HTTP request containing email input
     * @return array Result array with success status, message, token, and email
     */
    public function execute(Request $request)
    {
        // Validate the email input - this is business logic, not HTTP logic
        $email = $request->validate([
            'email' => 'required|email|exists:logins,email',
        ]);

        // Generate a secure random token for password reset
        $token = Str::random(60);
        
        // Store the token in database for later verification
        PasswordReset::create([
            'email' => $email['email'],
            'token' => $token
        ]);

        // Return result - controller will convert this to JSON response
        return [
            'success' => true, 
            'message' => 'Password reset link sent to your email', 
            'token' => $token, 
            'email' => $email['email']
        ];
    }
}
