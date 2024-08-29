<?php

use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [ForumController::class, 'index'])
    ->name('home');

Route::get('/show-post/{post}', [ForumController::class, 'show'])
    ->name('show.post');

// Protected routes only for logged in users
Route::group(['middleware' => 'auth'], function () {

    Route::get('/add-post', [ForumController::class, 'create'])
        ->name('add.post');

    Route::post('/store-post', [ForumController::class, 'store'])
        ->name('store.post');

    Route::get('/edit-post/{post}', [ForumController::class, 'edit'])
        ->name('edit.post');

    Route::put('/update-post/{post}', [ForumController::class, 'update'])
        ->name('update.post');

    Route::delete('/delete-post/{post}', [ForumController::class, 'destroy'])
        ->name('delete.post');
});
