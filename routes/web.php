<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::get('/match/show/{game}', [GameController::class, 'show'])
        ->name('match.show');

    // Routes only for the admin

    Route::group(['middleware' => 'is_admin'], function () {

        Route::get('/match/create', [GameController::class, 'create'])
            ->name('match.create');

        Route::post('/match/store', [GameController::class, 'store'])
            ->name('match.store');

        Route::get('/match/edit/{game}', [GameController::class, 'edit'])
            ->name('match.edit');

        Route::put('/match/update/{game}', [GameController::class, 'update'])
            ->name('match.update');

        Route::delete('/match/delete/{game}', [GameController::class, 'destroy'])
            ->name('match.delete');

        Route::get('/teams', [TeamController::class, 'index'])
            ->name('teams');

        Route::get('/team/create', [TeamController::class, 'create'])
            ->name('team.create');

        Route::post('/team/store', [TeamController::class, 'store'])
            ->name('team.store');

        Route::get('/team/edit/{team}', [TeamController::class, 'edit'])
            ->name('team.edit');

        Route::put('/team/update/{team}', [TeamController::class, 'update'])
            ->name('team.update');

        Route::delete('/team/delete/{team}', [TeamController::class, 'destroy'])
            ->name('team.delete');

        Route::get('/players', [PlayerController::class, 'index'])
            ->name('players');

        Route::get('/player/create', [PlayerController::class, 'create'])
            ->name('player.create');

        Route::post('/player/store', [PlayerController::class, 'store'])
            ->name('player.store');

        Route::get('/player/edit/{player}', [PlayerController::class, 'edit'])
            ->name('player.edit');

        Route::put('/player/update/{player}', [PlayerController::class, 'update'])
            ->name('player.update');

        Route::delete('/player/delete/{player}', [PlayerController::class, 'destroy'])
            ->name('player.delete');
    });
});
