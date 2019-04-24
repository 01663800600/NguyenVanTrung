<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectAndChapterItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subject_and_chapter_item', function (Blueprint $table) {

          $table->bigIncrements('id')->unique();
          $table->string('subject_name_item');
            $table->integer('status_chapter_item');

         // // ?? ten giong nhau sau nay em dung where like em check tot hon la minh unique
         // unique no yeu cau chinh xac den tung chu
          
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('subject_and_chapter_item');
    }
}
