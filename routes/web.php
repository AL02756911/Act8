<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;



Route::resource('superheroes', App\Http\Controllers\SuperheroeController::class)->parameters(['superheroes' => 'superheroe']);
Route::resource('superheroes', 'App\Http\Controllers\SuperheroeController');

Route::get('superheroes-trashed', [SuperheroeController::class, 'trashed'])
    ->name('superheroes.trashed');

Route::patch('superheroes/{id}/restore', [SuperheroeController::class, 'restore'])
    ->name('superheroes.restore');