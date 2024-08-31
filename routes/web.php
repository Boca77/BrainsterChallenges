<?php

use App\Http\Controllers\CommentsController;
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
    // Discussion routes
    Route::get('/add-post', [ForumController::class, 'create'])
        ->name('add.post');

    Route::post('/store-post', [ForumController::class, 'store'])
        ->name('store.post');

    //Grouped routes with middleware to not allow a user to delete/edit a post that's not theirs 
    Route::group(['middleware' => 'allowed'], function () {

        Route::get('/edit-post/{post}', [ForumController::class, 'edit'])
            ->name('edit.post')->middleware('allowed');

        Route::put('/update-post/{post}', [ForumController::class, 'update'])
            ->name('update.post');

        Route::delete('/delete-post/{post}', [ForumController::class, 'destroy'])
            ->name('delete.post');
    });

    // Comment routes
    Route::post('/store-comment', [CommentsController::class, 'store'])
        ->name('store.comment');

    Route::get('/add-comment/{post_id}', [CommentsController::class, 'create'])
        ->name('add.comment');

    //Grouped routes with middleware to not allow a user to delete/edit a comment that's not theirs 
    Route::group(['middleware' => 'allowed-comments'], function () {
        Route::get('/edit-comment/{comment}', [CommentsController::class, 'edit'])
            ->name('edit.comment');

        Route::put('/update-comment/{comment}', [CommentsController::class, 'update'])
            ->name('update.comment');

        Route::delete('/delete-comment/{comment}', [CommentsController::class, 'destroy'])
            ->name('delete.comment');
    });


    // Admin protected routes
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/unapproved-posts', [ForumController::class, 'unApproved'])
            ->name('unapproved.posts');

        Route::put('/approve-post/{post}', [ForumController::class, 'approve'])
            ->name('approve.post');
    });
});
