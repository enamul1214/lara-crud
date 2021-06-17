<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileUploadController;
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
    return view('landing');
});

// Post Routes
Route::get('/posts', [PostsController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'create']);
Route::post('/posts', [PostsController::class, 'store']);


Route::get('/posts/{post}/edit', [PostsController::class, 'edit']);

Route::put('/posts/{post}', [PostsController::class, 'update']);

Route::delete('/posts/{post}', [PostsController::class, 'destroy']);

// Comment Routes
Route::get('/comments/create', [CommentController::class, 'create']);
Route::post('/posts', [CommentController::class, 'store']);

// Categories Route
Route::get('/categories', [CategoryController::class, 'index']);


Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categories/{category}', [CategoryController::class, 'update']);

Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);