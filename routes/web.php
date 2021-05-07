<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WinkController;
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

Route::get('/', [WinkController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [WinkController::class, 'show'])->name('blog.show');
Route::get('/preview/{slug}', [WinkController::class, 'preview'])->name('blog.preview');

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/setup', [HomeController::class, 'setup'])->name('setup');
