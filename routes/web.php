<?php

use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/coba', 'coba');
// Route::prefix('auth')->group(function(){
//     Route::controller()
// });
Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::controller(ForgotPasswordController::class)->group(function(){
    Route::get('forget-password','showEmailForm')->name('forget.password.get');
    Route::post('forget-password', 'submitEmailForm')->name('forget.password.post');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');

});