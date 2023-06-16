<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\UserController;
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

Route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comment.create');
Route::get('/users/{user}/comments/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/users/comments/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comment.index');


Route::put('/users/{id}/', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


