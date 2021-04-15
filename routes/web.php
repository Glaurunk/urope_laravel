<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/', [App\Http\Controllers\CommonPagesController::class, 'index'])->name('player_home');

// player resources
    Route::get('/characters', [App\Http\Controllers\PlayerPagesController::class, 'index'])->name('player_characters');   



    //  dm routes
    Route::group(['prefix' => 'dm', 'middleware' => ['isdm']], function () {
        Route::get('/', [App\Http\Controllers\DMPagesController::class, 'index'])->name('dm_home');
    }); // end dm routes




}); // end auth routes

Auth::routes();

