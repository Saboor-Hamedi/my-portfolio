<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontModelController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontModelController::class, 'index'])->name('index');
Route::get('posts/show/{slug}', [FrontModelController::class, 'show'])->name('posts.show');
Route::get('about/index', [AboutController::class, 'index'])->name('about.index');
Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
Route::get('posts/show/{posts}', [PostsController::class, 'show'])->name('posts.show');
