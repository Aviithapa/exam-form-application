<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
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
});

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
Route::get('/student/personal/form', [ApplicantController::class, 'personalForm'])->name('student.personalForm');
Route::get('/student/guardian/form', [ApplicantController::class, 'guardianForm'])->name('student.guardianForm');
Route::get('/student/qualification/form', [ApplicantController::class, 'qualificationForm'])->name('student.qualificationForm');

Route::post('/student/personal/store', [ApplicantController::class, 'personalInformation'])->name('student.personalInformation');
Route::post('/student/guardian/store', [ApplicantController::class, 'guardianStore'])->name('student.guardian.store');
Route::post('/student/qualification/store', [ApplicantController::class, 'qualificationStore'])->name('student.qualification.store');


//Route Save Image
Route::post('/save_image/{id?}', [ApplicantController::class, 'save_image'])->name('save_image');

// Route::post('/save_image/{id?}', [SettingController::class, 'save_image'])->middleware(['auth'])->name('save_image');
