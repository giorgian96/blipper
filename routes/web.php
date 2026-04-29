<?php

use App\Http\Controllers\BlipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlipController::class, 'index'])->name('home');
Route::post('/blips', [BlipController::class, 'store']);
Route::get('/blips/{blip}/edit', [BlipController::class, 'edit']);
Route::put('/blips/{blip}', [BlipController::class, 'update']);
Route::delete('/blips/{blip}', [BlipController::class, 'destroy']);
