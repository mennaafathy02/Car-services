<?php

use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\OfferController;
use App\Http\Controllers\Api\User\OrderController;
use App\Http\Controllers\Api\User\SupervisorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| api file route ,Here's we write the routes of api {dashboard}
|
 */

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', "login");
    Route::post('/verify', "verify");
    Route::post('/register', "register");
    Route::post('/resend-pin-code', "resendPinCode");
    Route::post('/social/{type}/{code}', "social");

    Route::post("/reset-password", "resetPassword");
    Route::put("/reset-password", "changePassword");

    Route::group(['middleware' => ['auth:user', 'user']], function () {
        Route::post('/logout', "logout");
        Route::get('/', "index");
        Route::put('/', "update");
    });
});

Route::group(['middleware' => ['auth:user', 'user']], function () {

    Route::controller(SupervisorController::class)->group(function () {
        Route::prefix('supervisors')->group(function () {
            Route::get('/', "all");
            Route::get('{id}', "find");
            Route::post('/rate', "rate");
        });
    });
    Route::controller(OfferController::class)->group(function () {
        Route::prefix('offers')->group(function () {
            Route::get('/', "all");
            Route::get('{id}', "find");
        });
    });
    Route::controller(OrderController::class)->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', "all");
            Route::get('{id}', "find");
            Route::post('/', "create");
            Route::post('/cancel/{id}', "cancel");
        });
    });
});
