<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\api\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/create', [ItemController::class, 'create'])->name('books.create');
Route::get('/books', [ItemController::class, 'index']);
Route::post('/books', [ItemController::class, 'store'])->name('books.store');