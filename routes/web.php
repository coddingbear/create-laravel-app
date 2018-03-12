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

// 이미지에 대한 응답
Route::get('docs/images/{image?}', 'DocsController@image')
	->where('image', '[\pL-\pN\._-]+-img-[0-9]{2}.png');

Route::get('docs/{file?}', 'DocsController@show');

