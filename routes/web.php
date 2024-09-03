<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\gate;
use App\Http\Controllers\dataMahasiswa;
use App\Http\Controllers\crudController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\Auth\ForgetPasswordController;

// WOI INI KODING BARU DAN GUA LAGI COBA YE BUAT GIT-HUB

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/index', function(){
// return view('index');
// })->middleware('auth');

Route::get('/login', [LoginController::class,'showLogin'])->name('login');
Route::post('/login', [LoginController::class,'login']);
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

// Register
Route::get('/register', [LoginController::class,'showRegis'])->name('register');
Route::post('/registeraction', [LoginController::class,'regis'])->name('reg');
Route::get('/email/verify', [LoginController::class, 'showVerificationNotice'])
    ->middleware('auth')
    ->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [LoginController::class, 'verifyEmail'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [LoginController::class, 'resendVerificationEmail'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

// Forgot Password
Route::get('/forgotpassword', [ForgetPasswordController::class,'forgot'])->name('password.request');
Route::post('/forgotpassword', [ForgetPasswordController::class,'emailSubmit'])->name('password.email');
Route::get('/forgotpassword/{token}', [ForgetPasswordController::class,'showPass'])->name('password.reset');
Route::post('/updatepassword', [ForgetPasswordController::class,'reset'])->name('password.update');

// Profil
Route::get('/profile-user', [profilController::class,'profileForm'])->name('me');
Route::get('/profile-admin', [profilController::class,'profileFormAdmin'])->name('meAdmin');
Route::put('/profileaction', [profilController::class,'updateProfile'])->name('updateprof');

// Route::get('/testing', [dataMahasiswa::class,'index']);

Route::middleware([gate::class . ':Admin', 'verified'])->group (function() {
    // Route::get('/index', [dataMahasiswa::class,'index'])->name('index');
    Route::get('/user', [dataMahasiswa::class,'user'])->name('user');
    Route::post('/add-user', [crudController::class, 'tambah'])->name('add');
    Route::delete('/user/{id}', [crudController::class, 'hapus'])->name('die');
    Route::put('/user', [crudController::class, 'barui'])->name('baru');

    Route::get('/index', [dataMahasiswa::class,'index'])->name('index');
    Route::get('/dashboard', [dataMahasiswa::class,'hitung'])->name('count');
    Route::get('/index/create', [crudController::class,'create']);
    Route::post('/store', [crudController::class, 'store'])->name('store');
    Route::get('/index/{nrp}/edit', [crudController::class, 'edit'])->name('edit');
    Route::put('/index', [crudController::class, 'update'])->name('update');
    // Route::put('/index/{nrp}', [crudController::class, 'update'])->name('update');
    Route::delete('/index/{nrp}', [crudController::class, 'destroy'])->name('delete');
});

Route::middleware([gate::class . ':User', 'verified'])->group (function() {
    Route::get('/indexUser', [dataMahasiswa::class,'indexUser'])->name('indexUser');
});