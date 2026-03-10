<?php

namespace App\Http\Controllers;

use App\Actions\Password\CheckEmailForReset;
use App\Actions\Password\ResetUserPassword;
use Illuminate\Http\Request;

/**
 * Password Controller
 * 
 * This controller demonstrates the ACTION PATTERN where business logic is separated
 * into dedicated Action classes. The controller only handles HTTP concerns.
 * 
 * CONTROLLER-ACTION LIAISON EXPLAINED:
 * 
 * BEFORE (Traditional Approach):
 * - Controller contained all logic (validation, database operations, etc.)
 * - Hard to test business logic separately
 * - Code became messy as features grew
 * 
 * AFTER (Action Pattern):
 * - Controller is thin - only handles HTTP request/response
 * - Business logic lives in Action classes
 * - Actions are injected via constructor/method parameters (Dependency Injection)
 * - Controller calls action->execute() and formats response
 * 
 * FLOW:
 * 1. HTTP request hits controller method
 * 2. Laravel automatically injects the required Action class
 * 3. Controller delegates business logic to action
 * 4. Action returns result array
 * 5. Controller converts result to JSON response
 */
class PasswordController extends Controller
{
    /**
     * Handle password reset email check request
     * 
     * @param Request $request HTTP request with email input
     * @param CheckEmailForReset $checkEmailForReset Action class injected automatically
     * @return \Illuminate\Http\JsonResponse JSON response for the client
     */
    public function checkEmail(Request $request, CheckEmailForReset $checkEmailForReset)
    {
        // Delegate business logic to action - controller doesn't know HOW it works
        $result = $checkEmailForReset->execute($request);
        
        // Controller only handles HTTP formatting
        return response()->json($result);
    }

    /**
     * Handle password reset request
     * 
     * @param Request $request HTTP request with token, email, and new password
     * @param ResetUserPassword $resetUserPassword Action class injected automatically
     * @return \Illuminate\Http\JsonResponse JSON response for the client
     */
    public function resetPassword(Request $request, ResetUserPassword $resetUserPassword)
    {
        // Delegate business logic to action
        $result = $resetUserPassword->execute($request);
        
        // Controller only handles HTTP formatting
        return response()->json($result);
    }
}
