<?php

//simple postscontrollers...
Route::get('/homes','PostsController@homes');
Route::get('/','PostsController@homes');

//login form for admin...
Route::match(['get','post'],'/admin','AdminController@login');

//if login success for normal users...
Route::get('/dashboard','DashboardController@index');


//this helps to have common routes(those who need authetication) binds 

//problem is on using it, default login and custom admin login may conflict

//instead i used Session for my login, and default login is handle by it's own code...

//I am not using this , because it assumes the laravel default auth
Route::group(['middleware' => ['auth']],function(){
		
});

//if login success for admin...
Route::get('admin/dashboard', 'AdminController@dashboard');
Auth::routes();

//view the list of users and admins...
Route::get('/admin/view','AdminController@view');

//simple logout functionality...
Route::get('/logout', 'AdminController@logout');

//form to add users...
Route::match(['get','post'],'/admin/add_user','AdminController@register_users');

//to update users...(@problem)
Route::get('/admin/update_users/{id}','AdminController@update_users');

//for menus...
Route::resource('menus','MenuController');

Route::post('/menus/store',[
        'uses'=>'MenuController@store',
        'as'=>'menu.store'
    ]);

// Route::post('/menus/store','MenuController@store');

