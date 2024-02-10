<?php

use App\Http\Controllers\Api\Supervisor\AuthController;
use App\Http\Controllers\Api\Supervisor\OfferController;
use App\Http\Controllers\Api\Supervisor\OrderController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', "login");
    Route::post('/register', "register");
    Route::post("/reset-password", "resetPassword");
    Route::post("/confirm-pin-code", "confirmPinCode");
    Route::put("/confirm-password", "confirmPassword");

    Route::group(['middleware' => ['auth:supervisor', 'supervisor']], function () {
        Route::post('/logout', "logout");
        Route::get('/', "index");
        Route::put('/', "update");
    });

});

Route::group(['middleware' => ['auth:supervisor', 'supervisor']], function () {
    Route::controller(OrderController::class)->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', "all");
            Route::get('{id}', "find");
            Route::post('accept/{id}', "accept");
            Route::post('reject/{id}', "reject");

        });
    });

    //  offers routes
    Route::controller(OfferController::class)->group(function () {
        Route::prefix('offers')->group(function () {
            Route::get('/', "all");
            Route::get('{id}', "find");
            Route::post("/", 'create');
            Route::put('{id}', "update");
            Route::delete('{id}', "delete");
        });
    });

    Route::post("/subscribe", [\App\Http\Controllers\Api\Supervisor\SubscribeController::class, "create"]);
});
