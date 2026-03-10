<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;
use App\Models\Login;

class UpdateProfile
{
    public function execute(Request $request)
    {
        // Update user profile logic here
        $user = Login::find($request->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return $user;
    }
}
