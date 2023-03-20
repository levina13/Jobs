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
// Coba
    Route::view('cv-form', 'cv.form');


// Route untuk Halaman Home
Route::get('/', function () {
    return view('index');
})->name('home');

// Route untuk halaman Forget Password
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::delete('forget-password', 'submitEmailForm')->name('forget.password.post');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
    Route::get('forget-password', 'showEmailForm')->name('forget.password.get');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
});


// Route untuk autentikasi
Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function () {
        Route::post('register-user', 'registerUser')->name('submit.register.user');
        Route::post('register-company', 'registerCompany')->name('submit.register.company');
        Route::post('login', 'login')->name('submit.login');
        Route::get('login', 'loginView')->name('loginView');
        Route::get('register', 'RegisView')->name('regisView');
    });
});

// Route untuk pencari loker yg sudah login
Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::view('cv-form', 'cv.form');

    // Route untuk verifikasi Email & telepon
    // Melamar pekerjaan
    // Membuat CV
    // Edit Profil

    // Route untuk yang sudah verifikasi telepon & email


    // Pembuat Loker
        // CRUD loker
        // Menerima/menolak pelamar
        // Edit profil perusahaan

});




// Route untuk pembuat loker

Route::view('/coba', 'auth.logReg');
Route::view('/registrasiUserView', 'auth.registrasiUser')->name('page.registrasiUser');
Route::view('/cobalintang', 'coba.coba');
Route::view('/cvawal', 'auth.cvawal')->name('cvawal');
Route::view('/cvform', 'auth.cvform')->name('cvform');
Route::post('/alert', function () {

});



Route::get('/coba-alert',function(){
    redirect()->route('alert')->with('success', 'alhamdulillah');
});

// Route::prefix('auth')->group(function(){
//     Route::controller()
// });


// Route::controller(ForgotPasswordController::class)->group(function(){
//     Route::get('/forget-password','showEmailForm')->name('forget.password.get');
//     Route::get('/reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
// });
