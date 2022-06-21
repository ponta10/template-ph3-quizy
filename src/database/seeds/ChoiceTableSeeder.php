<?php

use Illuminate\Database\Seeder;

class ChoiceTableSeeder extends Seeder
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
                'question_id' => 1,
                'name' => 'たかなわ',
                'valid' => 1,
            ],
            [
                'question_id' => 1,
                'name' => 'たかわ',
                'valid' => 0,
            ],
            [
                'question_id' => 1,
                'name' => 'こうわ',
                'valid' => 0,
            ],
            [
                'question_id' => 2,
                'name' => 'かめと',
                'valid' => 0,
            ],
            [
                'question_id' => 2,
                'name' => 'かめど',
                'valid' => 0,
            ],
            [
                'question_id' => 2,
                'name' => 'かめいど',
                'valid' => 1,
            ],
            [
                'question_id' => 3,
                'name' => 'むこうひら',
                'valid' => 0,
            ],
            [
                'question_id' => 3,
                'name' => 'むきひら',
                'valid' => 0,
            ],
            [
                'question_id' => 3,
                'name' => 'むかいなだ',
                'valid' => 1,
            ],
        ];


        foreach ($params as $param) {
            DB::table('choices')->insert($param);
        }
    }
}
