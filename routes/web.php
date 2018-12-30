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

//view the list of users...
Route::get('/admin/view','AdminController@view');

//view the list of admins...
Route::get('/admin/view2','AdminController@view_admins');

//view the list of menus...
Route::get('/menu/view','MenuController@index');

//view the list of submenus...
// Route::get('/submenu/view',)

//simple logout functionality...
Route::get('/logout', 'AdminController@logout');

//to delete the users...
Route::get('/admin/delete/{id}','AdminController@delete');

//to update users...
Route::match(['get','post'],'/admin/update_users/{id}',[
	   'uses' =>'AdminController@update_users',
	   'as'  =>'admin.update'
    ]);
    
//to delete the menus...
Route::get('/menu/delete/{id}','MenuController@destroy');

// //to update menus...
// Route::match(['get','post'],'/menu/update_menus/{id}',[
// 	   'uses' =>'MenuController@update_users',
// 	   'as'  =>'admin.update'
// 	]);

//to toogle active to inactive and vice-versa in button pressed
Route::get('/admin/toogle/{id}','AdminController@toogle_status');

//to toogle active to inactive and vice-versa in button pressed
Route::get('/menu/toogle/{id}','MenuController@toogle_status');

//form to add users...
Route::match(['get','post'],'/admin/add_user','AdminController@register_users');

//for menus...
Route::resource('menus','MenuController');

Route::post('/menus/store',[
        'uses'=>'MenuController@store',
        'as'=>'menu.store'
    ]);

Route::post('/submenus/store',[
        'uses'=>'SubmenuController@store',
        'as'=>'submenu.store'
    ]);