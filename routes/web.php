<?php

use Illuminate\Support\Facades\Route;
use App\Posts;
//use App\Http\Controllers\PostsController;


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

Route::get('/create','PostsController@create');
Route::get('/about','PostsController@index');
Route::get('/update','PostsController@edit');


/*Route::get('/update', function () {
    return view('post_update');
});*/
//Route::resource("Create_Blog",'PostsController@create');
//Route::resource("about",PostsController::class);
Route::resource("posts",PostsController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
