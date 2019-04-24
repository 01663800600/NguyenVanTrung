<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matrixs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrixs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_subject');
            $table->integer('status_matrix');
            $table->unsignedBigInteger('id_user')->nullable();
        });

        Schema::table('matrixs', function (Blueprint $table)
        {
           //khoa phu cap nhat xoa sua
            $table->foreign('id_subject')
            ->references('id')->on('subjects')
            ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('id_user')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrixs');
    }
}
