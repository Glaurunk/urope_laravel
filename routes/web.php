<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonPagesController;
use App\Http\Controllers\PlayerPagesController;
use App\Http\Controllers\DMPagesController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {

//  player routes
    Route::get('/', [CommonPagesController::class, 'index'])->name('player_home');
// player resources
    Route::get('/characters', [PlayerPagesController::class, 'index'])->name('player_characters');   
// Game routes
    Route::get('/game', [GameController::class, 'index'])->name('game');



//  dm routes
    Route::group(['prefix' => 'dm', 'middleware' => ['isdm']], function () {
        Route::get('/', [DMPagesController::class, 'index'])->name('dm_home');
    }); // end dm routes



}); // end auth routes

Auth::routes();

