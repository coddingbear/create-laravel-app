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

// 14.1 이벤트 기본 원리 - 이벤트 리스너
// Event::listen('article.created', function ($article) {
// 	dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
// 	dump($article->toArray());
// }); // listen(이벤트 이름, 이벤트 헨들러);

// DEBUG: DB 쿼리문 수행 확인
// DB::listen(function ($query) {
// 	dump($query->sql);
// });