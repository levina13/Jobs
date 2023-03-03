<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register')->name('submit.register');
    Route::post('login', 'login')->name('submit.login');
});
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::post('forget-password', 'submitEmailForm')->name('forget.password.post');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});