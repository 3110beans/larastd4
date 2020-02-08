<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // テーブルのクリア
	    DB::table('people')->truncate();

	    // 初期データ用意（列名をキーとする連想配列）
	    $people = [
		    ['name' => 'kazumi',
		    'age' => 40,
		    'mail' => 'kzm@t.com'],
		    ['name' => 'nama',
		    'age' => 36,
		    'mail' => 'mail.nana@t.com'],
		    ['name' => 'yuta',
		    'age' => 4,
		    'mail' => 'mail.yuta@t.com'],
		    ['name' => 'ayano',
		    'age' => 2,
		    'mail' => 'mail.ayano@t.com'],
	    ];

	    // 登録
	    foreach($people as $p) {
		    \App\People::create($p);
	    }
    }
}
