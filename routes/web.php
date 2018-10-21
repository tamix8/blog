<?php

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

Auth::routes();

Route::prefix('/')->group(function() {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');
    Route::get('blog_list', 'BlogController@blog_list')->name('home.blogs.list');
    Route::get('blog_detail/{id}', 'BlogController@blog_detail')->name('home.blogs.blog_detail');
});



Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/home', 'AdminController@index')->name('admin.home');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::resource('blogs', 'Admin\BlogController', ['as' => 'admin']);
    Route::get('/blog_list', 'Admin\BlogController@blog_list')->name('admin.blogs.list');
});

Route::group(['middleware' => 'auth:web'], function(){
    Route::resource('blogs', 'BlogController');
    Route::resource('users', 'UserController');
});