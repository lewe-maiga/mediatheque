<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CDController;
use App\Http\Controllers\MicrofilmController;
use App\Http\Controllers\NewsPaperController;
use App\Http\Controllers\ProfileController;
use App\Models\NewsPaper;
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

//CRUD Operations
//Books
Route::resource("books", BookController::class)->except([
    "destroy",
]);

//CDs
Route::resource("cds", CDController::class)->except([
    "destroy",
]);

//Newspapers
Route::resource("newspapers", NewsPaperController::class)->except([
    "destroy",
]);

Route::get("/api/books", [BookController::class, "api"]);
Route::get("/api/newspapers", [NewsPaperController::class, "api"]);
Route::get("/api/cds", [CDController::class, "api"]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
