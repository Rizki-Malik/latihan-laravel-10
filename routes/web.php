<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('home', [
        "title" => "Beranda",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "name" => "Muhammad Rizki Malik Aziz",
        "email" => "rimali.qwerty@gmail.com",
        "image" => "pp.png",
        "title" => "Tentang",
        "active" => "about",
    ]);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);


// Route::get('/category/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'title' => "Category : $category->name",
//         'posts' => $category->posts->load('category', 'author'),
//         "active" => "categories",
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts',[
//         'title' => "Post by Author : $author->name",
//         "active" => "blog",
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });