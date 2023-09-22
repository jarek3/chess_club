<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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
Route::delete('/games/{game}', [App\Http\Controllers\GameController::class, 'destroy'])->name('games.destroy');
Route::delete('/home/{home}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');
Route::resource('/users', UsersController::class);
Route::get('/backend', [UsersController::class, 'index']);
Route::get('/users/create', [UsersController::class, 'create']);
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::put('/users/{user} ', [UsersController::class, 'update'])->name('users.update');
Route::resource('/home', HomeController::class);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::post('/home', [HomeController::class, 'store'])->name('home.store');
Route::get('/home/create', [HomeController::class, 'create']);;
Route::put('/home/{home} ', [HomeController::class, 'update'])->name('home.update');
Route::put('/home/{home}/edit', [HomeController::class, 'edit'])->name('home.edit');
Route::resource('/games', GameController::class);
Route::get('/games/create', [GameController::class, 'create']);
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::put('/games/{game} ', [GameController::class, 'update'])->name('game.update');
Route::put('/games/{game}/edit', [GameController::class, 'edit'])->name('game.edit');
Route::get('games//create', [GameController::class, 'create'])->name('games.create');
Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'forceDestroy',
])->name('user.destroy');
