<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'index'])
    ->name('index');

Route::get('/login', [PageController::class, 'create'])
    ->name('login');

Route::post('user', [PageController::class, 'store'])
    ->name('user.store');

Route::get('user/show', [PageController::class, 'show'])
    ->name('user.show');

Route::get('/logout', [PageController::class, 'destroy'])
    ->name('logout');
