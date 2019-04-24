<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Du lieu thu user name
    	DB::table('users')->insert(
    		[
    			[
    				'name' => 'admin','email' => 'admin@gmail.com','password' => bcrypt('admin'),
    				'phone' => Str::random(10),'birthday' => '2019-7-7', 'level' => '1'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '1'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			],
    			[
    				'name' => Str::random(5),'email' => Str::random(10).'@gmail.com','password' => bcrypt('trung'),
    				'phone' => Str::random(10),'birthday' => '2019-4-5', 'level' => '0'
    			]
    		]
    	);


    }
}
