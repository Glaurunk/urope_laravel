<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\GameController;

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

// Public
// retrieves all characters data
Route::get('/data', [APIController::class, 'data'])->name('data');


// Protected-Authenticated
Route::middleware('auth:sanctum')->group(function () {
// Protected-Authenticated: Everybody
    Route::get('/roll', [GameController::class, 'rollDice'])->name('roll');
    Route::get('/move/{creatureType}/{creatureId}/{targetId}/{sourceId}', [GameController::class, 'moveCreature'])->name('roll');

// Protected-Authenticated: DM only actions
    Route::middleware('isdm')->group(function () {

    });

});

