<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CustomAuth\CustomAuthController;

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
/* clear view cache */
Route::get('/clear-view-cache', function () {
    Artisan::call('view:clear');
    return 'View Cache Cleared';
});

Route::get('/phpinfo', function () {
    phpinfo();
});



