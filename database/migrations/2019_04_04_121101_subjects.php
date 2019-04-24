<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_class')->nullable();
            $table->string('subject_name');
        });

        Schema::table('subjects', function (Blueprint $table) {
            // $table->foreign('id_class')->references('id')->on('classes');
            $table->foreign('id_class')
            ->references('id')->on('classes')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onUpdate('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
