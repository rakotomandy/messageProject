<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginUser;
use App\Actions\Auth\LogoutUser;
use App\Actions\Auth\RegisterUser;
use App\Actions\Auth\UpdateProfile;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request, LoginUser $loginUser)
    {
        $result = $loginUser->execute($request);
        return response()->json($result);
    }

    public function signup(Request $request, RegisterUser $registerUser)
    {
        $result = $registerUser->execute($request);
        return response()->json($result);
    }

    public function updateProfile(Request $request, UpdateProfile $updateProfile)
    {
        $result = $updateProfile->execute($request);
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function logout(Request $request, LogoutUser $logoutUser)
    {
        $result = $logoutUser->execute($request);
        return response()->json($result);
    }
}