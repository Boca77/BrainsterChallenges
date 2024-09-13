<?php

use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index'])
    ->name('home');

Route::get('/create', [WebController::class, 'create'])
    ->name('create');

Route::get('/edit/{vehicle}', [WebController::class, 'edit'])
    ->name('edit');
