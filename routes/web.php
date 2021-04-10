<?php

use Illuminate\Support\Facades\Route;
use App\Posts;

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
/*Route::get('/about', function () {
    $posts = Posts::all();
    return view('about',compact('posts'));
});*/
/*Route::get('/posts', function () {
    return view('posts');
});
*/

Route::get('/home', function () {
    return view('welcomepage');
});
Route::get('/Contact', function () {
    return view('posts_create');
});
Route::get('/update', function () {
    return view('post_update');
});
Route::resource("about",PostsController::class);
Route::resource("posts",PostsController::class);
