<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\personal_info;
use App\Project;
use DB;

use File; // For File


class personalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
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
        return view('index',compact(['personal_infos','projects']));

        
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
        $personal_infos = personal_info::all();

        return view('adminsite/personalInfo.show')->with('personal_infos', $personal_infos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $personal_infos = personal_info::all();

        return view('adminsite/personalInfo.edit')->with('personal_infos', $personal_infos);
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
            'project1_title' => 'required',
            'project1_desc' => 'required',
            'project2_title' => 'required',
            'project2_desc' => 'required',
            'project3_title' => 'required',
            'project3_desc' => 'required'




        ]);


        
        //Handle File Upload
        if($request->hasFile('profile_pic')){
            //Get filename with the ext
            $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('profile_pic')->move(public_path('/uploadedimages'), $filenameToStore);
            // imageName = time().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('/uploadedimages'), $imageName);
            // $path = $request->file('profile_pic')->Storage::disk('public')->put('imgs/', $filenameToStore);


        }
        else if($request->hasFile('resume')){
            //Get filename with the ext
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('resume')->move(public_path('/uploadedimages'), $filenameToStore);

        }
        else if($request->hasFile('cover_img')){
            //Get filename with the ext
            $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('cover_img')->move(public_path('/uploadedimages'), $filenameToStore);
        }
        else if($request->hasFile('project1_img')){
            //Get filename with the ext
            $filenameWithExtp1 = $request->file('project1_img')->getClientOriginalName();
            //Get just filename
            $filenamep1 = pathinfo($filenameWithExtp1, PATHINFO_FILENAME);
            //Get just ext
            $extensionp1 = $request->file('project1_img')->getClientOriginalExtension();
            //Filename to store
            $filenameToStorep1=$filenamep1.'_'.time().'.'.$extensionp1;
            //Upload Image
            $path1 = $request->file('project1_img')->move(public_path('/uploadedimages'), $filenameToStorep1);
        }
        else if($request->hasFile('project2_img')){
            //Get filename with the ext
            $filenameWithExtp2 = $request->file('project2_img')->getClientOriginalName();
            //Get just filename
            $filenamep2 = pathinfo($filenameWithExtp2, PATHINFO_FILENAME);
            //Get just ext
            $extensionp2 = $request->file('project2_img')->getClientOriginalExtension();
            //Filename to store
            $filenameToStorep2=$filenamep2.'_'.time().'.'.$extensionp2;
            //Upload Image
            $path2 = $request->file('project2_img')->move(public_path('/uploadedimages'), $filenameToStorep2);
        }
        else if($request->hasFile('project3_img')){
            //Get filename with the ext
            $filenameWithExtp3 = $request->file('project3_img')->getClientOriginalName();
            //Get just filename
            $filenamep3 = pathinfo($filenameWithExtp3, PATHINFO_FILENAME);
            //Get just ext
            $extensionp3 = $request->file('project3_img')->getClientOriginalExtension();
            //Filename to store
            $filenameToStorep3=$filenamep3.'_'.time().'.'.$extensionp3;
            //Upload Image
            $path3 = $request->file('project3_img')->move(public_path('/uploadedimages'), $filenameToStorep3);
        }






        // create personal_info
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
        $personal_info->project1_title = $request->input('project1_title');
        $personal_info->project1_desc = $request->input('project1_desc');
        $personal_info->project2_title = $request->input('project2_title');
        $personal_info->project2_desc = $request->input('project2_desc');
        $personal_info->project3_title = $request->input('project3_title');
        $personal_info->project3_desc = $request->input('project3_desc');






        if($request->hasFile('profile_pic')){

                if($personal_info->profile_pic != 'profile.jpg'){

                   //Storage::delete('imgs/'.$personal_info->profile_pic);


                    File::delete(public_path('uploadedimages/'.$personal_info->profile_pic));


                    }

            $personal_info->profile_pic = $filenameToStore;

        }
        else if($request->hasFile('resume')){

            if($personal_info->resume != 'resume.docx'){
                File::delete(public_path('uploadedimages/'.$personal_info->resume));
                }

        $personal_info->resume = $filenameToStore;

        }

        else if($request->hasFile('cover_img')){

            if($personal_info->cover_img != 'cover_img.jpg'){
                File::delete(public_path('uploadedimages/'.$personal_info->cover_img));
                }

        $personal_info->cover_img = $filenameToStore;

        }
        else if($request->hasFile('project1_img')){

            if($personal_info->project1_img != 'project1_img.JPG'){
                File::delete(public_path('uploadedimages/'.$personal_info->project1_img));
                }

        $personal_info->project1_img = $filenameToStorep1;

        }
        else if($request->hasFile('project2_img')){

            if($personal_info->project2_img != 'project2_img.JPG'){
                File::delete(public_path('uploadedimages/'.$personal_info->project2_img));
                }

        $personal_info->project2_img = $filenameToStorep2;

        }
        else if($request->hasFile('project3_img')){

            if($personal_info->project3_img != 'project3_img.JPG'){
                File::delete(public_path('uploadedimages/'.$personal_info->project3_img));
                }

        $personal_info->project3_img = $filenameToStorep3;

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
        $project1_desc = "I create this projects using c# , mysql for database";

        $project2_img = "project2_img.JPG";
        $project2_title = "Treasury System With barcode";
        $project2_desc = "I create this projects using Visual Basic , mysql for database";

        $project3_img = "project3_img.JPG";
        $project3_title = "Entrance Exam And Monitoring Students";
        $project3_desc = "I create this projects using C# , mysql for database";






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

        else if($personal_info->cover_img != 'cover_img.jpg'){
            File::delete(public_path('uploadedimages/'.$personal_info->cover_img));
            }
        else if($personal_info->resume != 'resume.docx'){
            File::delete(public_path('uploadedimages/'.$personal_info->resume));
                }
        else if($personal_info->project1_img != 'project1_img.JPG'){
            File::delete(public_path('uploadedimages/'.$personal_info->project1_img));
                    }
        else if($personal_info->project2_img != 'project2_img.JPG'){
            File::delete(public_path('uploadedimages/'.$personal_info->project2_img));
                        }
        else if($personal_info->project3_img != 'project3_img.JPG'){
            File::delete(public_path('uploadedimages/'.$personal_info->project3_img));
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
