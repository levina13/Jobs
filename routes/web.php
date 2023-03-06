<?php

use App\Http\Controllers\API\AuthController;
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
Route::view('/registrasiUserView', 'auth.registrasiUser')->name('page.registrasiUser');
Route::view('/cobalintang', 'coba.coba');
Route::post('/alert', function () {
    
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['guest'])->group(function(){
    Route::get('/login',[AuthController::class, 'loginView'])->name('loginView');
    Route::get('/register', [AuthController::class, 'RegisView'])->name('regisView');

});

Route::get('/coba-alert',function(){
    redirect()->route('alert')->with('success', 'alhamdulillah');
});

// Route::prefix('auth')->group(function(){
//     Route::controller()
// });

Route::get('forget-password', [ForgotPasswordController::class,'showEmailForm'])->name('forget.password.get');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

// Route::controller(ForgotPasswordController::class)->group(function(){
//     Route::get('/forget-password','showEmailForm')->name('forget.password.get');
//     Route::get('/reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
// });