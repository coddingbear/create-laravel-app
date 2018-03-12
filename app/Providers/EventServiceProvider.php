<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    // protected $listen = [
    //     'App\Events\Event' => [
    //         'App\Listeners\EventListener',
    //     ],
    // ];
// 	14.10 실용적인 이벤트 시스템
	protected $listen = [
        \App\Events\ArticlesEvent::class => [
            \App\Listeners\ArticlesEventListener::class,
        ],
// 	14.15 내장 이벤트 이용
		\Illuminate\Auth\Events\Login::class => [
			\App\Listeners\UsersEventListener::class,
		],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
//		14.3 이벤트 레지스트리를 이용한 이벤트 리스너 등록
		// \Event::listen('article.created', function ($article) {
		// 	dump('이벤트를 받았습니다. 받은 데이터(상태)는 다음과 같습니다.');
		// 	dump($article->toArray());
		// });
//		14.5 이벤트 리스너 클래스 이용 시
		// \Event::listen(
		// 	'article.created',
		// 	\App\Listeners\ArticlesEventListener::class
		// );
//		14.7 이벤트 클래스 이용
		\Event::listen(
			\App\Events\ArticleCreated::class,
			\App\Listeners\ArticlesEventListener::class
		);
    }
}
