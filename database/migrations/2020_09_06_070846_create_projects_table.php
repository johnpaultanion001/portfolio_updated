<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('image');

            $table->string('ui_title1');
            $table->string('uiimage1');
            $table->string('ui_title2');
            $table->string('uiimage2');
            $table->string('ui_title3');
            $table->string('uiimage3');
            $table->string('ui_title4');
            $table->string('uiimage4');
            $table->string('ui_title5');
            $table->string('uiimage5');
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
