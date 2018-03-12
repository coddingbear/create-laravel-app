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

// code: 라라벨 내장 사용자 인증 사용하기 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// code: RESTful 리소스 컨트롤러 사용
Route::resource('articles', 'ArticlesController');

Route::get('docs/{file?}', function ($file = null) {
	$text = (new App\Documentation)->get($file);
	
	return app(ParsedownExtra::class)->text($text);
});