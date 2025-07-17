<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

Route::controller(SeriesController::class)->group(function () {
    Route::get('/series', 'index')->name('series.index');
    Route::get('/series/create', 'create')->name('series.create');
    Route::post('/series/save', 'store')->name('series.store');
    Route::get('/series/edit/{serie}', 'edit')->name('series.edit');
    Route::put('/series/update/{serie}', 'update')->name('series.update');
    Route::delete('/series/destroy/{serie}', 'destroy')->name('series.destroy');
});

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

