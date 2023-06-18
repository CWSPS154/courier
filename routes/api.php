<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\Customer\AddressBookController;
use App\Http\Controllers\Api\Customer\JobController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])
    ->middleware('auth:sanctum');
Route::middleware(['auth:sanctum', 'customer','is-active'])->prefix('v1/customer/')->group(function () {
    Route::apiResource('order-jobs', JobController::class);
    Route::apiResource('address-book', AddressBookController::class);
    Route::apiResource('areas', AreaController::class)->only('index','show');
});

