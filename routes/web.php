<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [ReviewController::class, 'index'])->name('list-review');

// Route::get('/', [ArtikelController::class, 'index'])->name('home');
Route::group(['prefix' => 'artikel', 'as' => 'artikel.'], function(){
    Route::get('/', [ArtikelController::class, 'index'])->name('home');
    Route::get('/buat', [ArtikelController::class, 'create'])->name('tambah-data');
    Route::post('/buat-data', [ArtikelController::class, 'store'])->name('buat-data');
    Route::get('/edit/{id}', [ArtikelController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ArtikelController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ArtikelController::class, 'destroy'])->name('destroy');
    Route::get('/detail/{id}', [ArtikelController::class, 'show'])->name('show');

});

// tugas CRUD
Route::group(['prefix' => 'review', 'as' => 'review.'], function(){
    Route::get('/', [ReviewController::class, 'index'])->name('list-review');
    Route::get('/create', [ReviewController::class, 'create'])->name('create');
    Route::post('/buat-review', [ReviewController::class, 'store'])->name('buat-review');
    Route::get('/edit/{id}', [ReviewController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ReviewController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ReviewController::class, 'destroy'])->name('destroy');
    Route::get('/detail/{id}', [ReviewController::class, 'show'])->name('show');

});
