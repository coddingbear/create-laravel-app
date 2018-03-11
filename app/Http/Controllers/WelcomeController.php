<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request; //지금은 사용되지 않으므로 주석 처리함.

class WelcomeController extends Controller
{
    public function index()
	{
		return view('welcome', [
			'name' => '홍길동',
			'greeting' => '환영합니다!',
			'items' => ['사과', '바나나', '오렌지', '파인애플']
		]);
	}
}
