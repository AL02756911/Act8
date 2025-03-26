<?php

use Illuminate\Support\Facades\Route;

Route::resource('superheroes', App\Http\Controllers\SuperheroeController::class)->parameters(['superheroes' => 'superheroe']);
Route::resource('superheroes', 'App\Http\Controllers\SuperheroeController');

