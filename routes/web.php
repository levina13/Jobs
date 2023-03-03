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
    return view('index');
})->name('home');
Route::view('/coba', 'auth.logReg');
Route::view('/loginView', 'auth.login')->name('page.login');
Route::view('/registrasiView', 'auth.registrasi')->name('page.registrasiPerusahaan');
Route::view('/registrasiUserView', 'auth.registrasiUser')->name('page.registrasiUser');
Route::view('/cobalintang', 'coba.coba');

// Route::prefix('auth')->group(function(){
//     Route::controller()
// });

Route::get('forget-password', [ForgotPasswordController::class,'showEmailForm'])->name('forget.password.get');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

// Route::controller(ForgotPasswordController::class)->group(function(){
//     Route::get('/forget-password','showEmailForm')->name('forget.password.get');
//     Route::get('/reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
// });