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

// code: 컨트롤러 사용
Route::get('/', 'WelcomeController@index');

// code: RESTful 리소스 컨트롤러 사용
Route::resource('articles', 'ArticlesController');

// code: 라우팅 파일만으로 사용자 인증 구현
Route::get('auth/login', function () {
	$credentials = [
		'email' => 'john@example.com',
		'password' => '112233'
	];
	
	if(! auth()->attempt($credentials)) {
		return '로그인 정보가 정확하지 않습니다.';
	}
	return redirect('protected');
//})->name('login');
});
// Route::get('protected', function () {
// 	dump(session()->all());
	
// 	if(! auth()->check()) {
// 		return '누구세요';
// 	}
// 	return '어서오세요 '.  auth()->user()->name;
// });

Route::get('protected', [
    'middleware' => 'auth',
    'uses' => function () {
        dump(session()->all());
        return '어서 오세요' . auth()->user()->name;
    },
]);

Route::get('auth/logout', function () {
	auth()->logout();
	
	return '또 봐요~';
});

// code: 라라벨 내장 사용자 인증 사용하기 
// php artisan make:auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');