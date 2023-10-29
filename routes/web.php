<?php

use App\Http\Controllers\Admin\ApplicantController as AdminApplicantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExamCenterController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Applicant\ApplicantController;
use App\Http\Controllers\Applicant\QualificationController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Sachiv\SachivController;
use App\Http\Controllers\User\UserController;
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
Route::get('/profile', [DashboardController::class, 'profile'])->middleware(['auth'])->name('profile');


//Route Exam
Route::get('/dashboard/exam', [ExamController::class, 'index'])->middleware(['auth'])->name('dashboard.exam.index');
Route::get('/dashboard/exam/create', [ExamController::class, 'create'])->middleware(['auth'])->name('dashboard.exam.create');
Route::post('/dashboard/exam/store', [ExamController::class, 'store'])->middleware(['auth'])->name('dashboard.exam.store');
Route::get('/dashboard/exam/edit/{id}', [ExamController::class, 'edit'])->middleware(['auth'])->name('dashboard.exam.edit');
Route::put('/dashboard/exam/update/{id}', [ExamController::class, 'update'])->middleware(['auth'])->name('dashboard.exam.update');
Route::delete('/dashboard/exam/destroy/{id}', [ExamController::class, 'destroy'])->middleware(['auth'])->name('dashboard.exam.destroy');


//Route use student 
Route::get('/student/personal/form', [ApplicantController::class, 'personalForm'])->middleware(['auth'])->name('student.personalForm');
Route::get('/student/guardian/form', [ApplicantController::class, 'guardianForm'])->middleware(['auth'])->name('student.guardianForm');

Route::post('/student/personal/store', [ApplicantController::class, 'personalInformation'])->name('student.personalInformation');
Route::post('/student/guardian/store', [ApplicantController::class, 'guardianInformation'])->name('student.guardian.store');


Route::put('/student/personal/update/{id}', [ApplicantController::class, 'personalInformationUpdate'])->name('student.personalInformation.update');
Route::put('/student/guardian/update/{id}', [ApplicantController::class, 'guardianInformationUpdate'])->name('student.guardian.update');

Route::get('/student/logs', [ApplicantController::class, 'profileLogs'])->middleware(['auth'])->name('student.logs');
Route::get('/student/re-review', [ApplicantController::class, 'reReview'])->middleware(['auth'])->name('student.re-review');



//Route Save Image
Route::match(['POST', 'PUT'], '/save_image/{id?}', [ApplicantController::class, 'save_image'])->name('save_image');


//Route Voucher Upload 
Route::match(['POST', 'PUT'], '/save_voucher/{id?}', [ApplicantController::class, 'applyExam'])->name('applyExam');



//Route Qualification
Route::get('/qualification/index', [QualificationController::class, 'index'])->middleware(['auth'])->name('qualification.index');
Route::get('/qualification/create', [QualificationController::class, 'create'])->middleware(['auth'])->name('qualification.create');
Route::post('/qualification/store', [QualificationController::class, 'store'])->middleware(['auth'])->name('qualification.store');
Route::get('/qualification/edit/{id}', [QualificationController::class, 'edit'])->middleware(['auth'])->name('qualification.edit');
Route::put('/qualification/update/{id}', [QualificationController::class, 'update'])->middleware(['auth'])->name('qualification.update');
Route::delete('/qualification/destroy/{id}', [QualificationController::class, 'destroy'])->middleware(['auth'])->name('qualification.destroy');


//Admin Applicant List Route
Route::get('/applicant/list', [AdminApplicantController::class, 'index'])->middleware(['auth'])->name('applicant.index');
Route::get('/applicant/show/{id}', [AdminApplicantController::class, 'show'])->middleware(['auth'])->name('applicant.show');
Route::get('/applicant/format/{id}', [AdminApplicantController::class, 'format'])->middleware(['auth'])->name('applicant.format');
Route::put('/applicant/change/status/{id}', [AdminApplicantController::class, 'status'])->middleware(['auth'])->name('applicant.status');
Route::get('/applicant/approved', [AdminApplicantController::class, 'approve'])->middleware(['auth'])->name('applicant.approve');
Route::get('/applicant/rejected', [AdminApplicantController::class, 'rejected'])->middleware(['auth'])->name('applicant.rejected');
Route::get('/applicant/admit-card/{id}', [AdminApplicantController::class, 'admit'])->middleware(['auth'])->name('applicant.admit');
Route::get('/applicant/generateAdmitCard', [AdminApplicantController::class, 'generateAdmitCard'])->middleware(['auth'])->name('applicant.generateAdmitCard');
Route::get('/applicant/admit-card-list', [AdminApplicantController::class, 'admitList'])->middleware(['auth'])->name('applicant.admit.list');


//Sachiv Applicant List 
Route::get('/sachiv/applicant/list', [SachivController::class, 'index'])->middleware(['auth'])->name('sachiv.applicant.index');
Route::get('/sachiv/applicant/show/{id}', [SachivController::class, 'show'])->middleware(['auth'])->name('sachiv.applicant.show');
Route::put('/sachiv/applicant/change/status/{id}', [SachivController::class, 'status'])->middleware(['auth'])->name('sachiv.applicant.status');



//Route Users
Route::get('/dashboard/user', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard.user.index');
Route::get('/dashboard/user/create', [UserController::class, 'create'])->middleware(['auth'])->name('dashboard.user.create');
Route::post('/dashboard/user/store', [UserController::class, 'store'])->middleware(['auth'])->name('dashboard.user.store');
Route::get('/dashboard/user/edit/{id}', [UserController::class, 'edit'])->middleware(['auth'])->name('dashboard.user.edit');
Route::put('/dashboard/user/update/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('dashboard.user.update');
Route::delete('/dashboard/user/destroy/{id}', [UserController::class, 'destroy'])->middleware(['auth'])->name('dashboard.user.destroy');


Route::resource('/dashboard/exam-center', ExamCenterController::class)->middleware(['auth'])->only('index', 'update');
Route::resource('/dashboard/university', UniversityController::class)->middleware(['auth']);

Route::get('/dashboard/voucher', [ApplicantController::class, 'voucherIndex'])->middleware(['auth'])->name('voucher.index');
Route::get('/dashboard/export', [AdminApplicantController::class, 'exportCsv'])->middleware(['auth'])->name('exportCsv.index');
Route::get('/dashboard/center-data', [AdminApplicantController::class, 'centerDataIndex'])->middleware(['auth'])->name('center.index');
