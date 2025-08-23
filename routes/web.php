<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
})->middleware(Autenticador::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('sign');

Route::get('/register', [RegisterController::class, 'create'])->name('users.create');
Route::post('/register', [RegisterController::class, 'store'])->name('users.store');

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create', 'create')->name('series.create');
    Route::post('/series/save', 'store')->name('series.store');
    Route::get('/series/edit/{serie}', 'edit')->name('series.edit');
    Route::put('/series/update/{serie}', 'update')->name('series.update');
    Route::delete('/series/destroy/{serie}', 'destroy')->name('series.destroy');
});

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

