<?php

use Illuminate\Database\Seeder;

class QuestionAndExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('question_and_exam')->insert(
    		[
    			[
    				'id_exam' => '1','id_question' => '1'
    			],
    			[
    				'id_exam' => '1','id_question' => '2'
    			],
    			[
    				'id_exam' => '1','id_question' => '3'
    			],
    			[
    				'id_exam' => '1','id_question' => '4'
    			],
    			[
    				'id_exam' => '1','id_question' => '5'
    			],
    			[
    				'id_exam' => '1','id_question' => '6'
    			],
    			[
    				'id_exam' => '2','id_question' => '1'
    			],
    			[
    				'id_exam' => '2','id_question' => '2'
    			],
    			[
    				'id_exam' => '2','id_question' => '6'
    			],
    			[
    				'id_exam' => '3','id_question' => '19'
    			],
    			[
    				'id_exam' => '3','id_question' => '20'
    			],
    			[
    				'id_exam' => '3','id_question' => '21'
    			],
    			[
    				'id_exam' => '3','id_question' => '22'
    			],
    			[
    				'id_exam' => '3','id_question' => '23'
    			],
    			[
    				'id_exam' => '4','id_question' => '29'
    			],
    			[
    				'id_exam' => '4','id_question' => '28'
    			],
    			[
    				'id_exam' => '4','id_question' => '27'
    			],
    			[
    				'id_exam' => '4','id_question' => '26'
    			],
    			[
    				'id_exam' => '4','id_question' => '25'
    			],
    			[
    				'id_exam' => '4','id_question' => '24'
    			],
    			[
    				'id_exam' => '4','id_question' => '23'
    			]
    			
    		]
    	);
    }
}
