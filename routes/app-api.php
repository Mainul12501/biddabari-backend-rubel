<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuth\CustomAuthController;
use App\Http\Controllers\Frontend\Pages\BasicViewController;
use App\Http\Controllers\AppApi\AppApiController;

use App\Http\Controllers\Frontend\Checkout\CheckoutController;
use App\Http\Controllers\Frontend\Student\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('api.')->group(function (){


    Route::get('app-course-details/{id}/{slug?}', [AppApiController::class, 'courseDetails']);
    Route::get('app-course-category-resources/{id}/{slug?}', [AppApiController::class, 'courseCategoryResources']);
    Route::get('app-category-wise-courses/{id}/{slug?}', [AppApiController::class, 'CategoryCoursesResources']);
    Route::get('app-all-courses', [AppApiController::class, 'allCourses']);


    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function (){

    });

});
