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
    return redirect()->route('users.show',[Auth::user()]);    //初始页面重定向到个人主页，没有登陆就重定向到登陆页面
});


// Route::get('/','StaticPagesController@home')->name('home');       //主页
Route::get('/help','StaticPagesController@help')->name('help');   //帮助
Route::get('/about','StaticPagesController@about')->name('about'); //关于

Route::get('signup','UsersController@create')->name('signup');    //注册用户
Route::resource('users', 'UsersController');

Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout',"SessionsController@destroy")->name('logout');

Route::resource('needs','NeedsController'); //需求资源器
