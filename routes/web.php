<?php

Route::get('/', function () {return view('Pages.homes');});

Route::get('/homes','PostsController@homes');
Route::get('/programs','PostsController@programs');
Route::get('/about','PostsController@about');
Route::match(['get','post'],'/admin','AdminController@login');

Route::get('/dashboard','DashboardController@index');

//this helps to have common routes(thos who need authetication) binds 

//problem is on using it, default login and mylogin may conflict

//instead i used Session for my login, and default login is handle by it's own code...

Route::group(['middleware' => ['auth']],function(){
	
});

Route::get('admin/dashboard', 'AdminController@dashboard');
Auth::routes();
Route::get('/logout', 'AdminController@logout');
Route::get('/admin/add','AdminController@add');
Route::get('/admin/show','AdminController@show');
Route::get('/admin/menu','AdminController@menu');
Route::get('/admin/view','AdminController@view');