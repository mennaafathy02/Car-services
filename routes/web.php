<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('{any?}', function () {
    return view('welcome');
});
Route::group(['prefix' => LaravelLocalization::setLocale() . '/admin', 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Auth::routes();
    Route::resource('forget-password', ForgetPasswordController::class);
    Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::group(['middleware' => ['auth']],
        function () {
            Route::get('/', [MainController::class, 'index'])->name('dashboard');
            Route::get("profile", [AdminController::class, "getProfile"])->name("get.profile");
            Route::post("profile", [AdminController::class, "postProfile"])->name("post.profile");
            // bookings
            Route::get("bookings", [AdminController::class, 'booking'])->name('bookings.index');
            Route::get("/logout", [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
            // contact us routes
            Route::get("contact-us", [MainController::class, 'contactUs'])->name('contact-us.index');
            Route::get("contact-us/{id}/toggle-read", [MainController::class, 'toggleReadContactUs'])->name('contact-us.toggle-read');
            // users routes
            Route::get("users", [MainController::class, 'users'])->name('users.index');
            Route::get("users/{id}/toggle-status", [MainController::class, 'toggleStatusUser'])->name('users.toggle-status');
            Route::resource('services', ServiceController::class);

        }
    );

});
