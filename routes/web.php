<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('access.login');
});

Route::get('/login', function () {
    return view('access.login');
})->name('login');

Route::get('/signup', function () {
    return view('access.signup');
})->name('signup');

// Route::post('/login', function () {
//     // Handle login logic here
//     return redirect('/dashboard'); // Redirect to dashboard after successful login
// });
Route::post("login",[LoginController::class,'login'])->name('login.submit');

Route::post("signup",[LoginController::class,'signup'])->name('signup.submit');

Route::middleware(['auth:login','prevent-back-history'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');
});

// CHECK EMAIL AND RESET PASSWORD

Route::get('/check-email', function () {
    return view('password.checkEmail');
})->name('checkEmail');

Route::post('/check-email', [PasswordController::class, 'checkEmail'])->name('checkEmail.submit');

Route::get('/reset-password/{token}/{email}', function ($token, $email) {
    return view('password.resetPassword', compact('token', 'email'));
})->name('resetPassword');

Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('resetPassword.submit');


