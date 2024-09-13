<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [VehicleController::class, 'index'])
    ->name('home');

Route::post('/store', [VehicleController::class, 'store']);

Route::delete('/delete/{vehicle}', [VehicleController::class, 'destroy']);

Route::put('/edit/{vehicle}', [VehicleController::class, 'update']);
