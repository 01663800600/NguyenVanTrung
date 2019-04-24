<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_matrix');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->integer('status_question');
            $table->text('content_question');
            $table->text('question_a');
            $table->text('question_b');
            $table->text('question_c');
            $table->text('question_d');
            $table->integer('answer');
            $table->integer('level_of_question'); 
        });

        Schema::table('questions', function (Blueprint $table)
        {
           //khoa phu cap nhat xoa sua
            // $table->foreign('id_matrix')->references('id')->on('matrixs');
            $table->foreign('id_matrix')
                ->references('id')->on('matrixs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_user')
                ->references('id')->on('users')
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
        Schema::dropIfExists('questions');
    }
}
