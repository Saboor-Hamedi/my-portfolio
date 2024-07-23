<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontModelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Middleware\CheckAdminAuth;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontModelController::class, 'index'])->name('index');
Route::get('posts/{slug}', [FrontModelController::class, 'show'])->name('posts.show');
// ---- Post controller
Route::resource('/posts', PostsController::class);
// ---- about controller
Route::get('about/index', [AboutController::class, 'index'])->name('about.index');
// --- contact controller
Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
// --- admin 

Route::middleware([CheckAdminAuth::class, PreventBackHistory::class])->group(function () {
    Route::resource('/admin', AdminController::class);
});



// ---- login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
