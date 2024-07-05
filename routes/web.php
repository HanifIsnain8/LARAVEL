<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
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

route::get('/', function(){
    return view('layout.welcome');
});


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login-proses','login_proses')->name('login-proses');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'register_proses')->name('register');
    Route::get('email/verify', 'verify_notice')->middleware('auth')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'verification_verify')->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('email/verification-notification', 'verification_send')->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    Route::get('auth/{provider}', 'redirectToProvider');
    Route::get('auth/{provider}/callback', 'handleProvideCallback');
    Route::get('/forgot-password','forgot_password')->middleware('guest')->name('password.request');
    Route::post('/forgot-password','password_email')->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}','password_reset')->middleware('guest')->name('password.reset');
    Route::post('/reset-password','password_update')->middleware('guest')->name('password.update');
    Route::get('logout', 'logout')->name('logout');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home','index')->name('home');
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile/change-password', 'changePassword')->name('changePassword');
    });
    Route::resource('kriteria', KriteriaController::class);
    Route::put('/kriteria/{id}/update-subs', [KriteriaController::class, 'updateSubs'])->name('subs_kriteria.update');
    Route::resource('alternatif', AlternatifController::class);
    Route::resource('nilai', NilaiController::class);
    Route::get('hasil',[NilaiController::class, 'hasil'])->name('hasil');
});


