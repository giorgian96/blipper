<?php

use App\Http\Controllers\BlipController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlipController::class, 'index'])->name('home');
