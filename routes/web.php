<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Setting\SettingController;
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
});

Route::get('/review-registration', function () {
    return view('website.review-registration');
});

Route::get('/profile', function () {
    return view('website.profile');
});

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
Route::delete('/dashboard/exam/destroy/{id}', [ExamController::class, 'update'])->middleware(['auth'])->name('dashboard.exam.destroy');





// Route::post('/save_image/{id?}', [SettingController::class, 'save_image'])->middleware(['auth'])->name('save_image');
