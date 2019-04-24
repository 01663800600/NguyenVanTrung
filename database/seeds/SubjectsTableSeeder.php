<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->insert(
    		[
    			[
    				'id_class' => '1','subject_name' => 'Toán'
    			],
    			[
    				'id_class' => '1','subject_name' => 'Hóa'
    			],
    			[
    				'id_class' => '1','subject_name' => 'Sinh'
    			],
    			[
    				'id_class' => '3','subject_name' => 'Hóa'
    			],
    			[
    				'id_class' => '3','subject_name' => 'Sinh'
    			],
    			[
    				'id_class' => '3','subject_name' => 'Tiếng anh'
    			],
    			[
    				'id_class' => '3','subject_name' => 'GDCD'
    			],
    			[
    				'id_class' => '2','subject_name' => 'Hóa'
    			],
    			[
    				'id_class' => '2','subject_name' => 'Văn'
    			],
    			[
    				'id_class' => '2','subject_name' => 'Tiếng Anh'
    			],
    			[
    				'id_class' => '2','subject_name' => 'Sử'
    			],
    			[
    				'id_class' => '2','subject_name' => 'Địa'
    			],
    			[
    				'id_class' => '4','subject_name' => 'sinh viên mác'
    			],
    			[
    				'id_class' => '4','subject_name' => 'Sinh viên english'
    			]
    			
    		]
    	);
    }
}
