<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::resource('/book', App\Http\Controllers\BookController::class)->except(['update', 'edit', 'destroy']);
    Route::put('/book/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('book.update')->middleware('canEditBook');
    Route::get('/book/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('book.edit')->middleware('canEditBook');
    Route::delete('/book/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.destroy')->middleware('canEditBook');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('/category', App\Http\Controllers\CategoryController::class);
});

Route::get('/export-books', [App\Http\Controllers\BookController::class, 'export'])->name('export.books');
Route::get('/export-books-pdf', [App\Http\Controllers\BookController::class, 'pdf_export'])->name('export.pdf');







