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
// Front
Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('/article/{slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.single');
Route::get('/category/{slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.single');
Route::get('/tag/{slug}', [\App\Http\Controllers\TagController::class, 'show'])->name('tag.single');
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/tags', \App\Http\Controllers\Admin\TagController::class);
    Route::delete('/posts_img/{post}/delete_img', [\App\Http\Controllers\Admin\PostController::class, 'deleteImg'])->name('posts_img.delete_img');
    Route::resource('/posts', \App\Http\Controllers\Admin\PostController::class);
});

// Login-Register
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('register.create');
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');

    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
});

Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout')->middleware('auth');

