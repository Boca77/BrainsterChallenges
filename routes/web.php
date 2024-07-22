<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [ProjectController::class, 'index'])
    ->name('home');

Route::get('/project/{project}', [ProjectController::class, 'show'])
    ->name('project.show');

Route::get('/admin/login', [AdminController::class, 'index'])
    ->name('admin.login');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');
