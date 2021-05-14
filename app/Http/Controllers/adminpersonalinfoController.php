<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\personal_info;
use Illuminate\Support\Facades\Storage;
use File;
use DB;
use Mail; 
use DataTables;
use Validator;


class adminpersonalinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function errordata($error)
    {
        return view('adminsite.personalinfo.errorData',['error' => $error]);
    }

    public function index(Request $request)
    {
        // $personal_infos = personal_info::all();
        // return view('adminsite.personalinfo.showinfo')->with('personal_infos', $personal_infos);
        
        if ($request->ajax()) {
            $data = personal_info::all();

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button onclick="singleview(this.value)" value="' . $data->id . '" id=v."' . $data->id . '" type="button" name="edit" edit="' . $data->id . '" class="edit btn btn-success btn-sm" data-toggle="modal" data-target="#viewModal"><i class="fa fa-eye"></i></button>';
                    $button .= '<button onclick="edit(this.value)" value="' . $data->id . '" id=e."' . $data->id . '" type="button" name="edit" edit="' . $data->id . '" class="edit btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-edit"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('adminsite.personalinfo.personalinfo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personalinfo = personal_info::find($id);
    	return view("adminsite.personalinfo.edit", compact("personalinfo"));
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
        $this->validate($request,[
            'intro_greetings' => 'required',
            'what_i_do' => 'required',
            'profile_pic' => 'mimes:png,jpg,jpeg,svg,bmp,ico',
            'more_about_me' => 'required',
            'college_desc' => 'required',
            'senior_high_desc' => 'required',
            'junior_high_desc' => 'required',
            'resume' => 'mimes:docx',
            'coverimg' => 'mimes:png,jpg,jpeg,svg,bmp,ico',
        ]);

        $personalinfo = personal_info::find($id);
        $personalinfo->intro_greetings = $request->intro_greetings;
        $personalinfo->what_i_do = $request->what_i_do;
        
        if ($image = $request->file('profile_pic')) {
            //unlink($personalinfo->profile_pic);
            if($personalinfo->profile_pic != 'uploadedimages/personalinfo/profile.jpg'){
                 File::delete(public_path($personalinfo->profile_pic));
             }

            $userid = auth()->user()->id;
            $extension = $image->getClientOriginalExtension(); 
            $imageName = "profile" ."_".time()."_".$userid.".".$extension;

            
            $image->move('uploadedimages/personalinfo', $imageName);
            $imageUrl = 'uploadedimages/personalinfo/'.$imageName;
            $personalinfo->profile_pic = $imageUrl;
        }

        $personalinfo->more_about_me = $request->more_about_me;
        $personalinfo->college_desc = $request->college_desc;
        $personalinfo->senior_high_desc = $request->senior_high_desc;
        $personalinfo->junior_high_desc = $request->junior_high_desc;
        
        if ($resume = $request->file('resume')) {
            //unlink($personalinfo->profile_pic);
            if($personalinfo->resume != 'uploadedimages/personalinfo/resume.docx'){
                 File::delete(public_path($personalinfo->resume));
             }

            $userid = auth()->user()->id;
            $extension = $resume->getClientOriginalExtension(); 
            $resumeName = "resume" ."_".time()."_".$userid.".".$extension;

            
            $resume->move('uploadedimages/personalinfo', $resumeName);
            $resumeUrl = 'uploadedimages/personalinfo/'.$resumeName;
            $personalinfo->resume = $resumeUrl;
        }

        if ($coverimg = $request->file('coverimg')) {
            //unlink($personalinfo->profile_pic);
            if($personalinfo->cover_img != 'uploadedimages/personalinfo/coverimg.jpg'){
                 File::delete(public_path($personalinfo->cover_img));
             }

            $userid = auth()->user()->id;
            $extension = $coverimg->getClientOriginalExtension(); 
            $coverName = "coverImg" ."_".time()."_".$userid.".".$extension;

            
            $coverimg->move('uploadedimages/personalinfo', $coverName);
            $coverUrl = 'uploadedimages/personalinfo/'.$coverName;
            $personalinfo->cover_img = $coverUrl;
        }
          
        $personalinfo->save();
        

        if($personalinfo){
            return response()->json("success");
        }else{
            return response()->json("error");
        }  
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
