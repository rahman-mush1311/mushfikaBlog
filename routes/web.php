<?php

use Illuminate\Support\Facades\Route;
use App\Posts;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
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
    return view('welcome'); //laravel er view ta return korbe
});
Route::get('/welcomepage', function () {
    return view('welcomepage');
});
Route::get('/about','PostsController@about_index'); //return a view(homepage.blade.php) with all the posts in database; for the guests
//Route::get('/homepage','PostsController@index'); //return a view (homepage.blade.php) with all the posts in database, home button e click korle kaj korbe.
Route::get('/blog','PostsController@blog_show'); //return a view(about.blade.php) with posts of particular users all posts.
Route::get('/create', 'PostsController@create'); // return a view (posts_create.blade.php)
Route::get('/update','PostsController@edit'); // return a view (posts_update.blade.php)
Route::post("save_comment/{postid}",'CommentController@save_comment'); //saves comments in comment controller er custom file e jabe
Route::get("/search_show",'PostsController@search_show');

Route::resource("posts",PostsController::class); //posts url jekhane pabe controller class er show method e giye particular post k show kore post.blade.php view return korbe
Route::resource("comment",CommentController::class);// apatoto commentcontroller class er store method tai kaj kortese


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


