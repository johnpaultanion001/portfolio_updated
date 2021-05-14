<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'JohnpaulAdmin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            
        ]);
        
        DB::table('msgs')->insert([
            'name' => 'test-name',
            'email' => 'test@gmail.com',
            'subject' => 'test-subject',
            'msg' => 'test-msg',
        ]);
        DB::table('projects')->insert([
            'title' => 'test-name',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
            'image' => 'uploadedimages/personalinfo/profile.jpg'
        ]);

        DB::table('personal_infos')->insert([
            'intro_greetings' => "HI, I'M JOHNPAUL TANION",
            'what_i_do' => "To know something new and enhance my skills in a dynamic and stable workplace.",
            'profile_pic' => "uploadedimages/personalinfo/profile.jpg",
            'more_about_me' => "To know something new and enhance my skills in a dynamic and stable workplace.
                                And to gain new experience and to utilize my interpersonal skills to achieve my goals.",
            'college_desc' => "Bachelor of Science in Computer Science At ICCT Colleges in Antipolo Branch And I am now 2yr college.",
            'senior_high_desc' => "Information and Communication Technology Strand And i graduate at Sti Ortigas Cainta.",
            'junior_high_desc' => "San Jose National High School Brgy San Jose , Antipolo City Rizal S.Y. 2015 – 2016.",
            'resume' => "uploadedimages/personalinfo/resume.docx",
            'cover_img' => "uploadedimages/personalinfo/coverimg.jpg",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

            
        ]);

         DB::table('contactinfos')->insert([
            'category_id' => '2',
            'valueofcontact' => 'johnpaultanion003@gmail.com'
         ]);
         DB::table('contactinfos')->insert([
            'category_id' => '3',
            'valueofcontact' => '09776668820'
         ]);
         DB::table('contactinfos')->insert([
            'category_id' => '3',
            'valueofcontact' => 'https://github.com/johnpaultanion'
         ]);
         DB::table('contactinfos')->insert([
            'category_id' => '2',
            'valueofcontact' => 'https://www.facebook.com/johnpaul.tanion.773'
         ]);
         DB::table('contactinfos')->insert([
            'category_id' => '1',
            'valueofcontact' => 'https://codepen.io/johnpaultanion001'
         ]);

         DB::table('mystudies')->insert([
            'nameofstudy' => 'C#'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'HTML/CSS'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'Python'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'Php-Laravel'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'JavaScript'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'Visual Basic'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'Ajax'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'Bootstrap'
         ]);
         DB::table('mystudies')->insert([
            'nameofstudy' => 'MYSQL for database'
         ]);

         DB::table('categories')->insert([
            'name' => 'phone'
         ]);
         DB::table('categories')->insert([
            'name' => 'gmail'
         ]);
         DB::table('categories')->insert([
            'name' => 'facebook'
         ]);
         DB::table('categories')->insert([
            'name' => 'codepen'
         ]);
         DB::table('categories')->insert([
            'name' => 'github'
         ]);
         DB::table('categories')->insert([
            'name' => 'others'
         ]);
         

    }
}
