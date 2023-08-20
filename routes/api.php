<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuth\CustomAuthController;
use App\Http\Controllers\Frontend\Pages\BasicViewController;

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
    Route::post('register', [CustomAuthController::class, 'register'])->name('register');
    Route::post('login', [CustomAuthController::class, 'login'])->name('login');

    Route::get('app-home-course-categories', [BasicViewController::class, 'appHomeCourseCategories']);
    Route::get('app-home-courses', [BasicViewController::class, 'appHomeCourses']);
    Route::get('app-home-products', [BasicViewController::class, 'appHomeProducts']);
    Route::get('app-home-notices', [BasicViewController::class, 'appHomeNotices']);
    Route::get('app-home-slider-courses', [BasicViewController::class, 'appHomeSliderCourses']);
    Route::get('app-home-popup-notification', [BasicViewController::class, 'appHomePopupNotification']);



    Route::get('web-home', [BasicViewController::class, 'home'])->name('web-home');
    Route::get('all-courses', [BasicViewController::class, 'allCourses'])->name('all-courses');
    Route::get('course-details/{id}/{slug?}', [BasicViewController::class, 'courseDetails'])->name('course-details');
    Route::get('checkout/{slug}', [BasicViewController::class, 'checkout'])->name('checkout');
    Route::get('category-courses/{id}/{slug?}', [BasicViewController::class, 'categoryCourses'])->name('category-courses');
    Route::get('all-instructors', [BasicViewController::class, 'instructors'])->name('instructors');
    Route::get('instructor-details/{slug}', [BasicViewController::class, 'instructorDetails'])->name('instructor-details');
    Route::get('all-blogs', [BasicViewController::class, 'allBLogs'])->name('all-blogs');
    Route::get('category-blogs/{slug}', [BasicViewController::class, 'categoryBlogs'])->name('category-blogs');
    Route::get('blog-details/{slug}', [BasicViewController::class, 'blogDetails'])->name('blog-details');
    Route::get('all-notices', [BasicViewController::class, 'allNotices'])->name('notices');
    Route::post('send-otp', [CustomAuthController::class, 'sendOtp'])->name('send-otp');
    Route::post('verify-otp', [CustomAuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::get('product-details/{slug}', [BasicViewController::class, 'productDetails'])->name('product-details');
    Route::get('free-courses', [BasicViewController::class, 'freeCourses'])->name('free-courses');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function (){
        Route::post('place-course-order/{course_id}', [CheckoutController::class, 'placeCourseOrder'])->name('place-course-order');
        Route::prefix('student')->name('student.')->group(function (){
            Route::get('dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
            Route::get('profile-update', [StudentController::class, 'profileUpdate'])->name('profile-update');
        });
    });

});
