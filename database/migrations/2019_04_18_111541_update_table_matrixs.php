<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableMatrixs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrixs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('id_chapter')->nullable();
            $table->unsignedBigInteger('id_item')->nullable();

            $table->foreign('id_chapter')
            ->references('id')->on('chapter')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_item')
            ->references('id')->on('subject_and_chapter_item')
            ->onUpdate('cascade')->onDelete('cascade');

             $table->unique(['id_chapter','id_item','id_user','id_subject']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matrixs', function (Blueprint $table) {
            //
        });
    }
}
