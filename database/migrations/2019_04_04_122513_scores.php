<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Scores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('id_user');

            $table->unsignedBigInteger('id_exam')->nullable();
            $table->integer('answer_number');
            $table->integer('exam_number');
            $table->integer('score');
            $table->dateTime('exam_day'); 
        });

        Schema::table('scores', function (Blueprint $table)
        {
           // $table->foreign('id_user')->references('id')->on('users'); //tao cai nay ko tao dc cai duoi
           //khoa phu cap nhat xoa sua
         $table->foreign('id_user')
         ->references('id')->on('users')
         ->onDelete('cascade')->onUpdate('cascade');

           //khoa phu cap nhat xoa sua
         $table->foreign('id_exam')
         ->references('id')->on('exams')
         ->onDelete('cascade')->onUpdate('cascade');
     });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
