<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Applicant\QualificationController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Models\Qualification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('website.index');
});

Route::get('/form', function () {
    return view('website.form');
    // return view('admin.pages.applicant.form');
});

Route::get('/review-registration', function () {
    return view('website.review-registration');
});

// Route::get('/form', function () {
//     return view('admin.pages.applicant.form');
// });

Route::get('/applicant-list', function () {
    return view('admin.pages.applicant-list');
});



//Route to login
Route::post('/login', [AuthController::class, 'login'])->middleware(['guest'])->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->middleware(['guest']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth'])->name('logout');

//Route to signup 
Route::get('/register', [RegistrationController::class, 'index'])->middleware(['guest'])->name('register.index');
Route::post('/create-account', [RegistrationController::class, 'store'])->middleware(['guest'])->name('register.store');
Route::get('/register-verify-otp/{email}', [RegistrationController::class, 'verifyOtpIndex'])->middleware(['guest'])->name('register.verify.otp');
Route::post('/verify-register-otp', [RegistrationController::class, 'verifyOtp'])->middleware(['guest'])->name('register.verifyOtp');
Route::get('/resend-opt/{email}', [RegistrationController::class, 'resendOtp'])->middleware(['guest'])->name('register.resendOtp');


//Reset Password Urls
Route::post('/forgot-password', [PasswordResetController::class, 'sendOtp'])->middleware(['guest'])->name('sendOtp');
Route::post('/verify-otp', [PasswordResetController::class, 'verifyOtp'])->middleware(['guest'])->name('verifyOtp');
Route::get('/password-reset-verify', [PasswordResetController::class, 'verifyOtpIndex'])->middleware(['guest'])->name('password.reset.verify');
Route::post('/resetPassword', [PasswordResetController::class, 'resetPassword'])->middleware(['guest'])->name('resetPassword');
Route::get('/resetPassword', [PasswordResetController::class, 'index'])->middleware(['guest'])->name('resetPassword.index');


//Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


//Route Exam
Route::get('/dashboard/exam', [ExamController::class, 'index'])->middleware(['auth'])->name('dashboard.exam.index');
Route::get('/dashboard/exam/create', [ExamController::class, 'create'])->middleware(['auth'])->name('dashboard.exam.create');
Route::post('/dashboard/exam/store', [ExamController::class, 'store'])->middleware(['auth'])->name('dashboard.exam.store');
Route::get('/dashboard/exam/edit/{id}', [ExamController::class, 'edit'])->middleware(['auth'])->name('dashboard.exam.edit');
Route::put('/dashboard/exam/update/{id}', [ExamController::class, 'update'])->middleware(['auth'])->name('dashboard.exam.update');
Route::delete('/dashboard/exam/destroy/{id}', [ExamController::class, 'destroy'])->middleware(['auth'])->name('dashboard.exam.destroy');


//Route Form Store
Route::get('/student/personal/form', [ApplicantController::class, 'personalForm'])->middleware(['auth'])->name('student.personalForm');
Route::get('/student/guardian/form', [ApplicantController::class, 'guardianForm'])->middleware(['auth'])->name('student.guardianForm');

Route::post('/student/personal/store', [ApplicantController::class, 'personalInformation'])->name('student.personalInformation');
Route::post('/student/guardian/store', [ApplicantController::class, 'guardianInformation'])->name('student.guardian.store');


Route::put('/student/personal/update/{id}', [ApplicantController::class, 'personalInformationUpdate'])->name('student.personalInformation.update');
Route::put('/student/guardian/update/{id}', [ApplicantController::class, 'guardianInformationUpdate'])->name('student.guardian.update');

//Route Save Image
Route::match(['POST', 'PUT'], '/save_image/{id?}', [ApplicantController::class, 'save_image'])->name('save_image');

//Voucher Upload 
Route::match(['POST', 'PUT'], '/save_voucher/{id?}', [ApplicantController::class, 'applyExam'])->name('applyExam');

// Route::post('/save_image/{id?}', [SettingController::class, 'save_image'])->middleware(['auth'])->name('save_image');


//Route Qualification
Route::get('/qualification/index', [QualificationController::class, 'index'])->middleware(['auth'])->name('qualification.index');
Route::get('/qualification/create', [QualificationController::class, 'create'])->middleware(['auth'])->name('qualification.create');
Route::post('/qualification/store', [QualificationController::class, 'store'])->middleware(['auth'])->name('qualification.store');
Route::get('/qualification/edit/{id}', [QualificationController::class, 'edit'])->middleware(['auth'])->name('qualification.edit');
Route::put('/qualification/update/{id}', [QualificationController::class, 'update'])->middleware(['auth'])->name('qualification.update');
Route::delete('/qualification/destroy/{id}', [QualificationController::class, 'destroy'])->middleware(['auth'])->name('qualification.destroy');
