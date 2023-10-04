<?php

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

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
});

Route::get('/applicant-list', function () {
    return view('admin.pages.applicant-list');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/save_image/{id?}', [SettingController::class, 'save_image'])->middleware(['auth'])->name('save_image');
