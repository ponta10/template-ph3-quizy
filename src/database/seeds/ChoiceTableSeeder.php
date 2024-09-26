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
        $selections = [
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
            [
                'question_id' => 4,
                'name' => 'おしらべ',
                'valid' => 0,
            ],
            [
                'question_id' => 4,
                'name' => 'みつぎ',
                'valid' => 0,
            ],
            [
                'question_id' => 4,
                'name' => 'みよし',
                'valid' => 1,
            ],
        ];


        foreach ($selections as $selection) {
            DB::table('choices')->insert($selection);
        }
    }
}
