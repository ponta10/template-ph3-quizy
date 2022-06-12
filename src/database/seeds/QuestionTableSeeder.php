<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
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
                'big_question_id' => 1,
                'image' => 'takanawa.png'
            ],
            [
                'big_question_id' => 1,
                'image' => 'kameido.png',
            ],
            [
                'big_question_id' => 2,
                'image' => 'mukainada.png'
            ],            
            [
                'big_question_id' => 2,
                'image' => 'mitsugi.png'
            ],
        ];

        foreach ($params as $param) {
            DB::table('questions')->insert($param);
        }
    }
}
