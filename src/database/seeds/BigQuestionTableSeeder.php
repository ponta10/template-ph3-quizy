<?php

use Illuminate\Database\Seeder;

class BigQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            [
                'name' => '東京の難読地名クイズ',
                'status' => 1
            ],
            [
                'name' => '広島の難読地名クイズ',
                'status' => 1
            ],
        ];


        foreach ($params as $param) {
            DB::table('big_questions')->insert($param);
        }
    }
}
