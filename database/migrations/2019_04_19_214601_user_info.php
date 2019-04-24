<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->unique();
            $table->string('images')->default('Hinh.jpg');;
            $table->tinyInteger('gender');
            $table->string('introduct');
            $table->date('created_at');
            $table->string('full_name');
            $table->string('title_user');


            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_info');
    }
}
