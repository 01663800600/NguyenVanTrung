<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Exams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_subject');
            $table->string('title')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->integer('time_to_do');
            $table->integer('status_exam');
            $table->integer('exam_number')->nullable();
            $table->integer('number_question')->nullable();
            $table->integer('level_of_exam')->nullable();
            $table->integer('same_exam')->nullable();
        });

        Schema::table('exams', function (Blueprint $table)
        {
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onUpdate('cascade');

            $table->foreign('id_subject')
                ->references('id')->on('subjects')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
