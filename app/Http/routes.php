<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

Route::get('/', 'BlogController@index');
Route::get('blog', 'BlogController@categoryGrid');
Route::get('blog/{slug}', 'BlogController@showPost');

Route::get('dashboard/post/addtop/{id}', 'Admin\PostController@getAddtop');
Route::get('dashboard/post/deltop/{id}', 'Admin\PostController@getDeltop');

Route::get('terms', function () {
	return view('blog.terms');
});

Route::get('ads', function () {
	return view('blog.ads');
});

Route::get('contact', function () {
	return view('blog.contact');
});

Route::get('about', function () {
	return view('blog.about');
});

Route::get('exchange', function () {
	return view('blog.exchange');
});

Route::get('dashboard', function () {
	return redirect('/dashboard/post');
});

Route::get('notfound', function () {
	return view('errors.404');
});

Route::get('cc', function () {
	$process = new Process('python /var/local/oxbapp/kk/app/Http/profilepost.py');
	try {
		$process->mustRun();

		var_dump($process->getOutput());
	} catch (ProcessFailedException $e) {
		var_dump($e->getMessage());
	}
});


Route::controller('dashboard/page','Admin\PageController');

Route::resource('dashboard/user', 'Admin\UserController', ['except' => 'show']);
Route::resource('dashboard/post', 'Admin\PostController', ['except' => 'show']);
Route::resource('dashboard/category', 'Admin\CategoryController', ['except' => 'show']);
Route::resource('dashboard/tag', 'Admin\TagController', ['except' => 'show']);
Route::resource('dashboard/ads', 'Admin\AdsController', ['except' => 'show']);


Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', function(){
	Auth::Logout();
	return redirect('/auth/login');
});