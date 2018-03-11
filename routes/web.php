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
//code: 기본 라우팅
// Route::get('/', function () {
// 	return view('welcome');
// });

// code: 라우팅에 대한 문자열 반환
// Route::get('/', function () {
//     return '<h1>Hello Foo</h1>';
// });

// code: URL 파라미터 패턴
// Route::pattern('foo', '[0-9a-zA-Z]{3}'); // 정규표현식으로 URL 파라미터 패턴을 강제
// Route::get('/{foo?}', function($foo ='bar') {
//     return $foo;
// });

// Route::get('/{foo?}', function ($foo = 'bar') {
// 	return $foo;
// })->where('foo', '[0-9a-zA-Z]{4}'); // where() 메서드 체인

// code: 라우트 이름
Route::get('/', [
	'as' => 'home',
	function () {
		return '제이름은 "home" 입니다.';
	}
]);
Route::get('/home', function () {
	return redirect(route('home'));
});