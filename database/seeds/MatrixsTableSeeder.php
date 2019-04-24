<?php

use Illuminate\Database\Seeder;

class MatrixsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('matrixs')->insert(
    		[
    			[
    				'id_subject' => '1','id_user' => '1','chapter' => 'Chương toán Rơi tự gio 1','chapter_item' => 'lực ma sát'
    			],
    			[
    				'id_subject' => '1','id_user' => '2','chapter' => 'Chương toán Rơi tự gio ','chapter_item' => 'Không lực ma sát'
    			],
    			[
    				'id_subject' => '3','id_user' => '1','chapter' => 'Chương Sinh 1','chapter_item' => 'Con cóc'
    			],
    			[
    				'id_subject' => '3','id_user' => '2','chapter' => 'Chương Sinh','chapter_item' => 'Con Heo'
    			],
    			[
    				'id_subject' => '3','id_user' => '2','chapter' => 'Chương Sinh','chapter_item' => 'Con Voi'
    			],
    			[
    				'id_subject' => '6','id_user' => '1','chapter' => 'Chương english 1','chapter_item' => 'Home'
    			],
    			[
    				'id_subject' => '6','id_user' => '2','chapter' => 'Chương english','chapter_item' => 'body'
    			],
    			[
    				'id_subject' => '6','id_user' => '1','chapter' => 'Chương english 1','chapter_item' => 'please sad'
    			],
    			[
    				'id_subject' => '6','id_user' => '2','chapter' => 'Chương english','chapter_item' => 'alone'
    			],
    			[
    				'id_subject' => '6','id_user' => '2','chapter' => 'Chương english','chapter_item' => 'i speak english'
    			],
    			[
    				'id_subject' => '6','id_user' => '2','chapter' => 'Chương english','chapter_item' => 'i want work'
    			],
    			[
    				'id_subject' => '14','id_user' => '2','chapter' => 'Chương Sinh viên english','chapter_item' => 'Chương Sinh viên english'
    			],
    			[
    				'id_subject' => '14','id_user' => '2','chapter' => 'Chương Sinh viên english','chapter_item' => 'KChương Sinh viên english'
    			],
    			[
    				'id_subject' => '14','id_user' => '2','chapter' => 'Chương Sinh viên english','chapter_item' => 'Chương Sinh viên english'
    			],
    			[
    				'id_subject' => '14','id_user' => '2','chapter' => 'Chương Sinh viên english','chapter_item' => 'Chương Sinh viên english'
    			],
    			[
    				'id_subject' => '14','id_user' => '2','chapter' => 'Chương Sinh viên english','chapter_item' => 'Chương Sinh viên english'
    			],
    			[
    				'id_subject' => '13','id_user' => '2','chapter' => 'Chương Sinh viên mac 1','chapter_item' => 'Chương Sinh viên mac 1'
    			],
    			[
    				'id_subject' => '13','id_user' => '2','chapter' => 'Chương Sinh viên mac 1','chapter_item' => 'Chương Sinh viên mac 1'
    			],
    			[
    				'id_subject' => '13','id_user' => '2','chapter' => 'Chương Sinh viên mac 1','chapter_item' => 'Chương Sinh viên mac 1'
    			],
    			[
    				'id_subject' => '13','id_user' => '2','chapter' => 'Chương Sinh viên mac 1','chapter_item' => 'Chương Sinh viên mac 1'
    			]
    		]
    	);
    }
}
