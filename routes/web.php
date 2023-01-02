<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CDController;
use App\Http\Controllers\MicrofilmController;
use App\Http\Controllers\NewsPaperController;
use App\Http\Controllers\ProfileController;
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

//read
Route::get("books", [BookController::class, "index"]);
Route::get("books/{book}", [BookController::class, "show"])->name("book.show")->whereNumber("id");
//form
Route::get("books/create", [BookController::class, "form"])->name("book.form");
//create
Route::post("books", [BookController::class, "create"])->name("book.store");
//update
Route::put("books/{id}", [BookController::class, "cre"])->name("book.update")->whereNumber("id");


Route::get("microfilms", [MicrofilmController::class, "index"]);
Route::get("newspapers", [NewsPaperController::class, "index"]);
Route::get("cds", [CDController::class, "index"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
