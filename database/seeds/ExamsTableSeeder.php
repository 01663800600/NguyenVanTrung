<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exams')->insert(
    		[
    			[
    				'id_user' => '1','id_subject' => '1','title' => 'đề thi 1 môn toán lớp 10',
    				'time_to_do' => '40','level_of_exam' => '10', 'number_question' => '40'
    			],
                [
                    'id_user' => '1','id_subject' => '1','title' => 'đề thi 2 môn toán lớp 10',
                    'time_to_do' => '40','level_of_exam' => '10', 'number_question' => '40'
                ],
                [
                    'id_user' => '1','id_subject' => '14','title' => 'đề thi 1 ad 1 môn Tiếng anh sinh vien',
                    'time_to_do' => '40','level_of_exam' => '10', 'number_question' => '40'
                ],
                [
                    'id_user' => '2','id_subject' => '14','title' => 'đề thi 2 ad 2 môn Tiếng anh sinh vien',
                    'time_to_do' => '40','level_of_exam' => '10', 'number_question' => '40'
                ]
    			
    		]
    	);
    }
}
