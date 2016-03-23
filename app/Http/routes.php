<?php

// Home
Route::get('/', [
	'uses' => 'BlogController@indexFront',
	'as' => 'home'
]);

// Admin
Route::get('admin', [
	'uses' => 'Admin\AdminController@admin',
	'as' => 'admin',
]);

Route::get('medias', [
	'uses' => 'Admin\AdminController@filemanager',
	'as' => 'medias',
	'middleware' => 'redac'
]);

// Blog
Route::get('blog/order', 'BlogController@indexOrder');
Route::get('articles', 'BlogController@indexFront');
Route::get('blog/tag', 'BlogController@tag');
Route::get('blog/search', 'BlogController@search');

Route::put('postseen/{id}', 'BlogController@updateSeen');
Route::put('postactive/{id}', 'BlogController@updateActive');

Route::resource('blog', 'BlogController');

// Comment
Route::resource('comment', 'CommentController', [
	'except' => ['create', 'show']
]);

Route::put('commentseen/{id}', 'CommentController@updateSeen');
Route::put('uservalid/{id}', 'CommentController@valid');

// Contact
Route::resource('contact', 'ContactController', [
	'except' => ['show', 'edit']
]);

// Auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Language
Route::get('language','Frontend\HomeController@language');

//Login
Route::get('login',function(){
   return view('admin.login');
});

//Post
Route::resource('admin/posts','Backend\PostController');
//Category
Route::resource('admin/categories','Backend\CategoryController');
//Pages
Route::resource('admin/pages','Backend\PageController');
//User
Route::resource('admin/users','Backend\UserController');
//Message
Route::resource('admin/messages','Backend\MessageController');
//Comment
Route::resource('admin/comments','Backend\CommentController');
//Tag
Route::resource('admin/tags','Backend\TagController');
//Role
Route::resource('admin/roles','Backend\RoleController');
//Menu
Route::resource('admin/menu','Backend\MenuController');