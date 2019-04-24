<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionAndExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_and_exam', function (Blueprint $table) {
            $table->unsignedBigInteger('id_exam');
            $table->unsignedBigInteger('id_question');
            
            // tạo khóa  2 cột không chùng nhau một lúc
            $table->unique(['id_exam', 'id_question']);
            
        });

        Schema::table('question_and_exam', function (Blueprint $table) {
         // $table->foreign('id_exam')->references('id')->on('exams');
           $table->foreign('id_exam')
           ->references('id')->on('exams')
           ->onDelete('cascade')->onUpdate('cascade');
         // $table->foreign('id_question')->references('id')->on('questions');

           $table->foreign('id_question')
           ->references('id')->on('questions')
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
        Schema::dropIfExists('question_and_exam');
    }
}
