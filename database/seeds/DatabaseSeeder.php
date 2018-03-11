<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('database.default') != 'sqlite') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0');
		}
		// Model::unguard(); // 라라벨 5.1에서 사용
		App\User::truncate(); // 테이블에 담긴 모든 데이터를 지운다.
		$this->call(UsersTableSeeder::class);
		
		App\Article::truncate();
		$this->call(ArticlesTableSeeder::class);
		
		// Model::reguard();
		if (config('database.default') !== 'sqlite') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1');
		}
    }
}
