<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\ITIController;

use App\Http\Controllers\BookController;

//Route::get('/iti', [ITIController::class, 'createPost']);
Route::get('/', [ITIController::class, 'getPosts'])->name("posts");
Route::get('/post/{id}', [ITIController::class, 'show'])->name("post");
Route::get('/create', [ITIController::class, 'createPost'])->name("createpost");

Route::post('/add', [ITIController::class,'save']);
Route::get('/post/del/{id}', [ITIController::class,'delete'])->name("deletepost");
Route::get('/post/upd/{id}', [ITIController::class, 'update'])->name("updatePost");

Route::post('/upd/{id}', [ITIController::class, 'update_db'])->name("update_db");

Route::get('/users', [ITIController::class, 'getUsers'])->name("users");

#books
Route::get("/books", [BookController::class, 'index'])->name("books.index");
Route::get("/books/create", [BookController::class, 'create'])->name("books.create");
Route::post("/books", [BookController::class, 'store'])->name("books.store");

Route::get("/books/show/{book}", [BookController::class, 'show'])->name("books.show");

Route::get("/books/edit/{book}", [BookController::class, 'edit'])->name("books.edit");

Route::put("/books/update/{book}", [BookController::class, 'update'])->name("books.update");


Route::delete("/books/delete/{book}", [BookController::class, 'destroy'])->name("books.destroy");