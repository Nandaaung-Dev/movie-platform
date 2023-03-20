<?php

use App\Http\Controllers\Web\MovieController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-movies', [MovieController::class, 'addMovies'])->name('movies.add');
Route::post('/store-movies', [MovieController::class, 'storeMovies'])->name('movies.store');
Route::get('/view-movies', [MovieController::class, 'viewMOvies'])->name('movies.view');
