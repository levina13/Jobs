<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\applicant\ContactController;
use App\Http\Controllers\applicant\CVController;
use App\Http\Controllers\applicant\JobsController;
use App\Http\Controllers\applicant\UsersController;
use App\Http\Controllers\company\Applicant;
use App\Http\Controllers\company\CompanyController;
use App\Http\Controllers\company\dashboard;
use App\Http\Controllers\company\JobVacancies;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\pageController;
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

//Route applicant
    Route::get('getRegion',[UsersController::class,'getRegion'])->name('select.Region.user');
    Route::get('getCity/{id}',[UsersController::class,'getCity'])->name('select.City.user');
    Route::get('getEducation',[UsersController::class,'getEducation'])->name('select.Education.user');


//Route coba company


// Route Global
Route::get('/', [pageController::class,'index'])->name('home');
Route::get('find-jobs', [JobsController::class, 'SearchFindJobs'])->name('findJobs');
Route::get('getRegion', [CompanyController::class, 'getRegion'])->name('select.Region');
Route::get('getCity/{id}', [CompanyController::class, 'getCity'])->name('select.City');
Route::get('getSector', [CompanyController::class, 'getSector'])->name('select.Sector');
Route::get('detail-jobs/{id}', [pageController::class,'detailLoker'])->name('detailjobs');
Route::get('company/{id}', [pageController::class,'companyProfile'])->name('companyProfile');
Route::get('profileapplicant/{id}', [pageController::class,'applicantProfile'])->name('profileapplicant');
Route::get('/cvawal', [CVController::class, 'indexCV'])->name('cvawal');
Route::post('send-message',[ContactController::class,'sendEmail'])->name('sendEmail');


//Route applicant
Route::view('indexapplicant', 'applicant.indexapplicant')->name('indexapplicant');




// Route untuk halaman Forget Password


// Route untuk autentikasi
Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function () {
        Route::post('register-user', 'registerUser')->name('submit.register.user');
        Route::post('register-company', 'registerCompany')->name('submit.register.company');
        Route::post('login', 'login')->name('submit.login');
        Route::get('login', 'loginView')->name('loginView');
        Route::get('register', 'RegisView')->name('regisView');
    });
    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::delete('forget-password', 'submitEmailForm')->name('forget.password.post');
        Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
        Route::get('forget-password', 'showEmailForm')->name('forget.password.get');
        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    });

});

// Route untuk pencari loker yg sudah login
Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['applicant'])->group(function(){
        Route::get('myjobshistory', [JobsController::class,'showHistory'])->name('myjobshistory');
        Route::get('myjobscurrently', [JobsController::class, 'showCurrently'])->name('myjobscurrently');
        Route::get('myjobsfavorite', [JobsController::class, 'showFavorite'])->name('myjobsfavorite');
        Route::get('applyform/{id}', [JobsController::class,'openApply'])->name('applyform');
        Route::post('applyform',[JobsController::class, 'applyJob'])->name('post.applyform');
        Route::get('/cvform/{id}', [CVController::class, 'showForm'])->name('cvform');
        Route::post('submitPDF', [CVController::class, 'submitCVProfile'])->name('submitCV');
        Route::get('pdfCV/{id}', [CVController::class, 'generatePDF'])->name('downloadPDF');
        Route::post('favorite/{id}',[JobsController::class,'favorite'])->name('favorite');
        Route::get('my-profile', [UsersController::class, 'showProfile'])->name('applicant.myProfile');
        Route::get('editprofileapplicant', [UsersController::class, 'viewEditProfile'])->name('editprofileapplicant');
        Route::post('editprofileapplicant', [UsersController::class, 'updateProfile'])->name('updateprofileapplicant');
    });
    // Route::view('cv-form', 'cv.form');
    // Route untuk verifikasi Email & telepon
    // Melamar pekerjaan
    // Membuat CV
    // Edit Profil

    // Route untuk yang sudah verifikasi telepon & email


    // Pembuat Loker
    Route::middleware(['company'])->group(function(){
            Route::get('dashboard', [dashboard::class,'getDashboard'])->name('view.company.dashboard');
            // CRUD Job Vacancies
            Route::get('job-vacancies', [JobVacancies::class,'index'])->name('view.company.jobVacancies');
            Route::get('job-vacancies/create',[JobVacancies::class, 'viewCreate'])->name('view.company.jobVacancies.create');
            Route::post('job-vacancies/create', [JobVacancies::class, 'storeJobVacancy'])->name('post.company.jobVacancies.create');
            Route::get('job-vacancies/create-position',[JobVacancies::class,'getPositionData'])->name('select-position.JobVacancies');
            Route::get('job-vacancies/create-education', [JobVacancies::class, 'getEducationData'])->name('select-education.JobVacancies');
            Route::get('job-vacancies/edit/{id}',[JobVacancies::class,'viewEdit'])->name('view.company.jobVacancies.edit');
            Route::post('job-vacancies/edit/',[JobVacancies::class,'updateJobVacancy'])->name('post.company.jobVacancies.edit');
            Route::post('job-vacancies/delete/{id}',[JobVacancies::class,'deleteJobVacancy'])->name('delete.company.jobVacancies');
            Route::get('job-vacancies/{id}', [JobVacancies::class,'detailJobVacancies'])->name('detail.company.jobVacancies');

            // CRUD Applicant
            Route::get('applicant', [Applicant::class,'showApplicant'])->name('view.company.applicant');
            Route::post('applicant/accept/{id}',[Applicant::class,'acceptApplicant'])->name('accept.company.applicant');
            Route::post('applicant/reject/{id}', [Applicant::class, 'rejectApplicant'])->name('reject.company.applicant');
            Route::get('accepted', [Applicant::class,'showAccepted'])->name('view.company.accepted');
            Route::get('rejected', [Applicant::class,'showRejected'])->name('view.company.rejected');

            // Edit Profil
            // Route::view('profilecompany', 'company.profilecompany')->name('profilecompany');
            Route::get('my-profilecompany', [CompanyController::class, 'viewMyProfile'])->name('company.myProfile');
            Route::middleware(['own'])->group(function () {
                Route::get('editprofilecompany/{id}', [CompanyController::class, 'viewEditProfile'])->name('editprofilecompany');
            });
            Route::post('editprofilecompany', [CompanyController::class, 'updateProfile'])->name('updateprofilecompany');

    });

});


