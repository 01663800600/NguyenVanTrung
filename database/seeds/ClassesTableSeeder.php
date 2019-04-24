<?php

use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Classes')->insert(
    		[
    			[
    				'class_name' => 'Lớp 10'
    			],
    			[
    				'class_name' => 'Lớp 11'
    			],
    			[
    				'class_name' => 'Lớp 12'
    			],
    			[
    				'class_name' => 'Sinh Viên'
    			],
    			[
    				'class_name' => 'Xa hội'
    			]
    			
    		]
    	);
    }
}
