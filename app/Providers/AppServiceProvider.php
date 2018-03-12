<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		// InnoDB 엔진에서 Long text 유니크 키 설정 오류에 대한 문제점 해결 방법
        // Schema::defaultStringLength(191); // 일반 string으로 설정된 컬럼의 길이를 191로 지정한다.
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		// 17.4 새로운 서비스 프로바이더 등록
        if ($this->app->environment('local')){
			$this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
		}
    }
}
