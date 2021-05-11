<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/greeting', function () {
//     return 'Hello World';
// });

Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{id}', [PostController::class, 'show']);

// save new post:
Route::get('/posts/add', [PostController::class, 'add']);
Route::post('/posts/store', [PostController::class, 'store']);

//edit an existing post:
Route::get('/posts/edit/{post}', [PostController::class, 'edit']);
Route::post('/posts/update/{post}', [PostController::class, 'update']);

Route::get('/posts/delete/{post}', [PostController::class, 'delete']);

Route::middleware(['checktitle'])->group(function () {
    Route::get('/posts/{post}', [PostController::class, 'show']);
});

Route::get('/', [PageController::class, 'index']);
Route::get('/pages/about', [PageController::class, 'about']);

Route::post('/comments/store/{post}', [CommentController::class, 'store']);
Route::get('/comments', [CommentController::class, 'index']);
