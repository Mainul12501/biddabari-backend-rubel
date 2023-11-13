<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CustomAuth\CustomAuthController;
use App\Http\Controllers\PaymentController;


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

Route::post('/register', [CustomAuthController::class, 'register'])->name('register');
Route::post('/login', [CustomAuthController::class, 'login'])->name('login');
Route::get('/forgot-user-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot-user-password');
Route::post('/send-password-reset-otp', [CustomAuthController::class, 'passResetOtp'])->name('send-password-reset-otp');
Route::get('/password-reset-otp', [CustomAuthController::class, 'passwordResetOtp'])->name('password-reset-otp');
Route::post('/verify-pass-reset-otp', [CustomAuthController::class, 'verifyPassResetOtp'])->name('verify-pass-reset-otp');


//Route::post('sslcommerz/success',[PaymentController::class, 'success'])->name('payment.success');
//Route::post('sslcommerz/failure',[PaymentController::class, 'failure'])->name('payment.failure');
//Route::post('sslcommerz/cancel',[PaymentController::class, 'cancel'])->name('payment.cancel');
//Route::post('sslcommerz/ipn',[PaymentController::class, 'ipn'])->name('payment.ipn');

Route::get('form',[PaymentController::class, 'form'])->name('form');
Route::post('form-order',[PaymentController::class, 'order'])->name('form-order');


/**
 * @return void
 */

/* clear all cache */
Route::get('/clear-all', function () {
    Artisan::call('optimize:clear');
    echo Artisan::output();
});

/* migration */
Route::get('/migrate',function(){
    Artisan::call('migrate');
    echo Artisan::output();
});

Route::get('/migrate-seed',function(){
    Artisan::call('migrate --seed');
    echo Artisan::output();
});

Route::get('/migrate-fresh-seed',function(){
    Artisan::call('migrate:fresh --seed');
    echo Artisan::output();
});

/* migration rollback */
Route::get('/migrate-rollback',function(){
    Artisan::call('migrate:rollback');
    echo Artisan::output();
});

/* create symbolic link */
Route::get('/symlink', function () {
    Artisan::call('storage:link');
    echo Artisan::output();
});
/* Optimize files */
Route::get('/optimize', function () {
    Artisan::call('optimize');
    echo Artisan::output();
});
/* clear view cache */
Route::get('/clear-view-cache', function () {
    Artisan::call('view:clear');
    return 'View Cache Cleared';
});
/* clear route cache */
Route::get('/clear-route-cache', function () {
    Artisan::call('route:clear');
    return 'View Cache Cleared';
});

Route::get('/phpinfo', function () {
    phpinfo();
});



