<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post("login", "login")->name("login");
    Route::post("register", "register")->name("register");
    Route::post("send-email-password/{email}", "sendEmailPassword")->name("sendEmailPassword");
    Route::post("reset-password", 'resetPassword')->name("resetPassword");

});

Route::controller(MainController::class)->group(function () {
    Route::post("contact-us", "contactUs")->name("contactUs");
    Route::get("testimonials", 'testimonials');
    Route::get("services", 'services');
});

Route::group(['middleware' => "auth:user"], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get("/", "profile")->name("profile");
        Route::get("/user-services", 'services');
        Route::post("/logout", 'logout')->name("logout");
        Route::post('book-service/{id}', 'bookService');
        Route::get('bookings', 'bookings');
    });

});
