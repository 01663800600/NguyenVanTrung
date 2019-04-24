<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectDefine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // bang dinh ngia cho mon hoc
        Schema::create('subject_define', function (Blueprint $table) {
          
         $table->bigIncrements('sd_id')->unique();
         $table->string('subject_name');
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
        Schema::dropIfExists('subject_define');

    }
}
