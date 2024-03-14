<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchBookController;
use App\Http\Controllers\BuyBookController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\IndexPostsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Route::resource('/', IndexPostsController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/searchbook', [SearchBookController::class, 'index']);
Route::match(['get', 'post'], '/searchbook', SearchBookController::class);

Route::get('/buybook', [BuyBookController::class, 'index']);
Route::match(['get', 'post'], '/buybook', BuyBookController::class);

Route::get('/authors', [AuthorsController::class, 'index']);
Route::match(['get', 'post'], '/authors', AuthorsController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
