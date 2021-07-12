<?php

use App\Http\Controllers\AvailableSlotController;
use App\Http\Controllers\BookSlotController;
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

Route::prefix('slots')->group(function () {
    Route::get('available', AvailableSlotController::class);
    Route::post('/', BookSlotController::class);
});
