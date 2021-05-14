<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\personal_info;
use App\Project;
use App\Mystudy;
use App\Contactinfo;
use DB;

use File; // For File


class personalController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

     // Don't forget to include 'use App\Product'
  
    
    // $personal_infos = DB::select('SELECT * FROM personal_infos WHERE id = 1');
    // return view('index')->with('personal_infos', $personal_infos);
    // $projects = Project::orderBy('id', 'desc')->paginate(6);
    // return view('adminsite/projects/all.index')->with('projects', $projects);

    {

        $personal_infos = personal_info::all();
        $projects = Project::orderBy('id', 'desc')->paginate(6);
        $studies = Mystudy::all();
        $contacts = Contactinfo::all();
        return view('index',compact(['personal_infos','projects','studies','contacts']));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    public function show($id)
    {
        $project = Project::find($id);
    	return view("single-view", compact("project"));
    }

    public function landingprojects()
    { 
        $projects = Project::latest()->get();
    	return view("landingprojects", compact("projects"));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'IntroGreetings' => 'required',
            'WhatIDo' => 'required',
            'MoreAboutMe' => 'required',
            'college_desc' => 'required',
            'senior_high_desc' => 'required',
            'junior_high_desc' => 'required',
            'mystudies1' => 'required',
            'mystudies2' => 'required',
            'mystudies3' => 'required',
            'mystudies4' => 'required',
            'mystudies5' => 'required',
            'mystudies6' => 'required',
            'mystudies7' => 'required',
            'mystudies8' => 'required',
            'mystudies9' => 'required',
            'mystudies10' => 'required',
            'gmail' => 'required',
            'contact_number' => 'required',
            'link1' => 'required',
            'link2' => 'required',
            'link3' => 'required',
            'link4' => 'required',
          



        ]);

        $personal_info = personal_info::find($id);
        $personal_info->intro_greetings = $request->input('IntroGreetings');
        $personal_info->what_i_do = $request->input('WhatIDo');
        $personal_info->more_about_me = $request->input('MoreAboutMe');
        $personal_info->college_desc = $request->input('college_desc');
        $personal_info->senior_high_desc = $request->input('senior_high_desc');
        $personal_info->junior_high_desc = $request->input('junior_high_desc');
        $personal_info->mystudies1 = $request->input('mystudies1');
        $personal_info->mystudies2 = $request->input('mystudies2');
        $personal_info->mystudies3 = $request->input('mystudies3');
        $personal_info->mystudies4 = $request->input('mystudies4');
        $personal_info->mystudies5 = $request->input('mystudies5');
        $personal_info->mystudies6 = $request->input('mystudies6');
        $personal_info->mystudies7 = $request->input('mystudies7');
        $personal_info->mystudies8 = $request->input('mystudies8');
        $personal_info->mystudies9 = $request->input('mystudies9');
        $personal_info->mystudies10 = $request->input('mystudies10');
        $personal_info->gmail = $request->input('gmail');
        $personal_info->contact_number = $request->input('contact_number');
        $personal_info->link1 = $request->input('link1');
        $personal_info->link2 = $request->input('link2');
        $personal_info->link3 = $request->input('link3');
        $personal_info->link4 = $request->input('link4');
       


        
        //Handle File Upload
        if($request->hasFile('profile_pic')){

            if($personal_info->profile_pic != 'profile.jpg'){
                File::delete(public_path('uploadedimages/'.$personal_info->profile_pic));
                }
            //Get filename with the ext
            $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'profile'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_pic')->move(public_path('/uploadedimages'), $filenameToStore);
            $personal_info->profile_pic = $filenameToStore;


        }
        if($request->hasFile('resume')){
            if($personal_info->resume != 'resume.docx'){
                File::delete(public_path('uploadedimages/'.$personal_info->resume));
                }
            //Get filename with the ext
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'resume'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('resume')->move(public_path('/uploadedimages'), $filenameToStore);
            $personal_info->resume = $filenameToStore;

        }
        if($request->hasFile('cover_img')){
            if($personal_info->cover_img != 'cover_img.jpg'){
                File::delete(public_path('uploadedimages/'.$personal_info->cover_img));
                }

            //Get filename with the ext
            $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'cover_img'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_img')->move(public_path('/uploadedimages'), $filenameToStore);
            $personal_info->cover_img = $filenameToStore;
        }
      
       

    

        $personal_info->save();

        return redirect('/adminsite/personalInfo/show')->with('success', 'Personal Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //PERSONAL INFO SET TO DEFAULT
        $intro = "HI, I'M JOHNPAUL TANION";
        $whatIDo = "To know something new and enhance my skills in a dynamic and stable workplace.";
        $profile = "profile.jpg";
        $more_about_me = "To know something new and enhance my skills in a dynamic and stable workplace.
                          And to gain new experience and to utilize my interpersonal skills to achieve my goals.";
        $college_desc = "Bachelor of Science in Computer Science At ICCT Colleges in Antipolo Branch And I am now 2yr college.";
        $seniorhigh_desc = "Information and Communication Technology Strand And i graduate at Sti Ortigas Cainta.";
        $juniorhigh_desc = "San Jose National High School Brgy San Jose , Antipolo City Rizal S.Y. 2015 – 2016.";
        $resume = "resume.docx";
        $mystudies1 = "Python";
        $mystudies2 = "Php";
        $mystudies3 = "JavaScript";
        $mystudies4 = "C#";
        $mystudies5 = "Visual Basic";
        $mystudies6 = "Jquery";
        $mystudies7 = "My Sql";
        $mystudies8 = "Bootstrap";
        $mystudies9 = "Asp.net";
        $mystudies10 = "HTML/CSS";

        $cover_img = "cover_img.jpg";
        $gmail = "johnpaultanion003@gmail.com";
        $contact_number = "09776668820";
        $link1 = "johnpaultanion";
        $link2 = "johnpaultanion";
        $link3 = "johnpaultanion001";
        $link4 = "johnpaul.tanion.773";

        $project1_img = "project1_img.JPG";
        $project1_title = "Library system with Barcode";
        $project1_desc = "I created this projects using c# , mysql for database";

        $project2_img = "project2_img.JPG";
        $project2_title = "Treasury System With barcode";
        $project2_desc = "I created this projects using Visual Basic , mysql for database";

        $project3_img = "project3_img.JPG";
        $project3_title = "Entrance Exam And Monitoring Students";
        $project3_desc = "I created this projects using C# , mysql for database";






        $personal_info = personal_info::find($id);
        $personal_info->intro_greetings = $intro;
        $personal_info->what_i_do = $whatIDo;
        $personal_info->more_about_me = $more_about_me;
        $personal_info->college_desc = $college_desc;
        $personal_info->senior_high_desc = $seniorhigh_desc;
        $personal_info->junior_high_desc = $juniorhigh_desc;


        $personal_info->mystudies1 = $mystudies1;
        $personal_info->mystudies2 = $mystudies2;
        $personal_info->mystudies3 = $mystudies3;
        $personal_info->mystudies4 = $mystudies4;
        $personal_info->mystudies5 = $mystudies5;
        $personal_info->mystudies6 = $mystudies6;
        $personal_info->mystudies7 = $mystudies7;
        $personal_info->mystudies8 = $mystudies8;
        $personal_info->mystudies9 = $mystudies9;
        $personal_info->mystudies10 = $mystudies10;


        $personal_info->gmail = $gmail;
        $personal_info->contact_number = $contact_number;
        $personal_info->link1 = $link1;
        $personal_info->link2 = $link2;
        $personal_info->link3 = $link3;
        $personal_info->link4 = $link4;

        $personal_info->project1_title = $project1_title;
        $personal_info->project1_desc = $project1_desc;
        $personal_info->project2_title = $project2_title;
        $personal_info->project2_desc = $project2_desc;
        $personal_info->project3_title = $project3_title;
        $personal_info->project3_desc = $project3_desc;



        if($personal_info->profile_pic != 'profile.jpg'){
            File::delete(public_path('uploadedimages/'.$personal_info->profile_pic));

        }

        if($personal_info->cover_img != 'cover_img.jpg'){
            File::delete(public_path('uploadedimages/'.$personal_info->cover_img));
            }
        if($personal_info->resume != 'resume.docx'){
            File::delete(public_path('uploadedimages/'.$personal_info->resume));
                }
     




        $personal_info->profile_pic = $profile;
        $personal_info->cover_img = $cover_img;
        $personal_info->resume = $resume;
        $personal_info->project1_img = $project1_img;
        $personal_info->project2_img = $project2_img;
        $personal_info->project3_img = $project3_img;

        $personal_info->save();

        return redirect('/adminsite/personalInfo/show')->with('success', 'Personal Information SET TO DEFAULT');
    }
}
