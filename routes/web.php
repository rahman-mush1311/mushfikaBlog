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
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcomepage');
});
Route::get('/about','PostsController@index');
Route::get('/blog','PostsController@blog_show');
Route::resource("posts",PostsController::class);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
if(Auth::check()) {
    Route::get('/create', 'PostsController@create');
    Route::get('/update','PostsController@edit');
}
