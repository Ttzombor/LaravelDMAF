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

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function (){
    Route::resource('posts', 'PostController')->names('blog.posts');
});

Route::resource('test', 'RestTestController')->names('restTest');

Auth::routes();

$group_data = ['namespace' => 'Blog\Admin',
                'prefix' => 'admin/blog'];

Route::group($group_data, function (){

    $methods = ['index', 'update', 'store', 'edit', 'create', 'destroy'];
    Route::resource('categories', 'CategoryController')
        ->only($methods)
        ->names('blog.admin.categories');
});

Route::get('/home', 'HomeController@index')->name('home');
