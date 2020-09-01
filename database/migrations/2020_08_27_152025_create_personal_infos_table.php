<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            //intro
            $table->increments('id');
            $table->string('intro_greetings');
            $table->string('what_i_do');
            $table->string('profile_pic');
            //body
            $table->mediumText('more_about_me');
           
            $table->string('college_desc');
            $table->string('senior_high_desc');
            $table->string('junior_high_desc');

            $table->string('resume');
            $table->string('mystudies1');
            $table->string('mystudies2');
            $table->string('mystudies3');
            $table->string('mystudies4');
            $table->string('mystudies5');
            $table->string('mystudies6');
            $table->string('mystudies7');
            $table->string('mystudies8');
            $table->string('mystudies9');
            $table->string('mystudies10');

            //contact info
            $table->string('cover_img');
            $table->string('gmail');
            $table->string('contact_number');
            $table->string('link1');
            $table->string('link2');
            $table->string('link3');
            $table->string('link4');

            //Projects
            $table->string('project1_img');
            $table->string('project1_title');
            $table->string('project1_desc');

            $table->string('project2_img');
            $table->string('project2_title');
            $table->string('project2_desc');

            $table->string('project3_img');
            $table->string('project3_title');
            $table->string('project3_desc');
           
            

            
        
            
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
        Schema::dropIfExists('personal_infos');
    }
}
