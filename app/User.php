<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ // 대량 할당이 가능한 열
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ // 조회 쿼리에서 제외할 열
        'password', 'remember_token',
    ];
	
	public function articles()
	{
		return $this->hasMany(Article::class);  // 나는 여러개의 articles를 가지고 있습니다.
	}
}
