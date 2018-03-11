<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content'];
	
	public function user() {
		return $this->belongsTo(User::class); // 나는 user 소속입니다.
	}
	
	public function tags() {
		// 다대다 관계 표시
		return $this->belongsToMany(Tag::class); // 여러개의 tag에 소속
	}
}
