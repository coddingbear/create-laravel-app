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

// 17.1 컴포넌트 사용하기
Route::get('markdown', function () {
	$text =<<<EOT
# 마크다운 예제 1

이 문서는 [마크다운][1]으로 썼습니다. 화면에 HTML로 변환되어 출력됩니다.
		
## 순서 없는 목록

- 첫 번째 항목
- 두 번째 항목[^1]
		
 [1]: http://daringfireball.net/projects/markdown
 [^1]: http://google.com	
EOT;
	return app(ParsedownExtra::class)->text($text);
});

// DEBUG: DB 쿼리문 수행 확인
// DB::listen(function ($query) {
// 	dump($query->sql);
// });