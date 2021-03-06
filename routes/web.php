<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::get('/game', [GameController::class, 'show'])->name('game.show');
Route::post('/game', [GameController::class, 'post'])->name('game.post');

Route::get('/', function () {
    return redirect()->route('auth.login');
});
