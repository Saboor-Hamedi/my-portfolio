<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontModelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontModelController::class, 'index'])->name('index');
Route::get('about/index', [AboutController::class, 'index'])->name('about.index');
Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
