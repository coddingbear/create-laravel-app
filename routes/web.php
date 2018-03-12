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

// 16.1 메일 메시지 만들기
Route::get('mail', function () {
	$article = App\Article::with('user')->find(1);
	
//  16.6 메일 보내기 : 복잡한 메세지 만들기
	// return Mail::send(
	// 	'emails.articles.created', 
	// 	compact('article'),
	// 	function($message) use ($article) {
	// 		$message->from('yours1@gmail.com, 'User Name');
	// 		$message->to('yours2@domain.com', 'yours3@domain.com');
	// 		$message->subject('새글이 등록되었습니다 -'. $article->title);
	// 		$message->cc('yours4@domain.com');
	// 		$message->attach(storage_path('elephant.png'));
	// 	}
	// );
//	16.7 텍스트 메일
	return Mail::send(
		['text' => 'emails.articles.created-text'],
		compact('article'),
		function ($message) use ($article) {
			$message->from('yours1@daum.net');
			$message->to('yours2@gmail.com');
			$message->subject('새 글이 등록되었습니다 - '. $article->title);
		}
	);
});

// DEBUG: DB 쿼리문 수행 확인
// DB::listen(function ($query) {
// 	dump($query->sql);
// });