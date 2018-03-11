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
// code: 뷰 반환
// Route::get('/', function () {
// 	return view('errors.503');
// });

// code: with() 메서드 이용한 데이터 바인딩
// Route::get('/', function () {
// 	return view('welcome')->with('name', 'Hong, Gildong');
// });
// Route::get('/', function () {
// 	return view('welcome')->with([
// 		'name' =>'홍길동',
// 		'greeting' => '안녕하세요?'
// 	]);
// });

// code: view() 함수 이용 방법
Route::get('/', function () {
	return view('welcome', [
		'name' =>'김춘추',
		'greeting' => '안녕하세요?'
	]);
});