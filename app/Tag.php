<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];
	
	public function articles() 
	{
		return $this->belongsToMany(Article::class); // 나는 여러개의 article에 소속 됩니다.
	}
}
