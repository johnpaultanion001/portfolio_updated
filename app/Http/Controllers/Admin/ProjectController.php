<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Project;
use App\Personal_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;
use Mail; 
use DataTables;
use File;
use Validator;

class ProjectController extends Controller
{  
    public function errordata($error)
    {
        return view('adminsite.projects.errorData',['error' => $error]);
    }

    public function index()
    { 
        $projects = Project::latest()->get();
        $portfolio = Personal_info::where('id', '1')->first();
        return view('admin.projects.projects', compact('projects' , 'portfolio'));
    }

    public function load(){
    	$projects = Project::latest()->get();
        return view('admin.projects.loadprojects', compact("projects"));
    }

    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $errors =  Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'img' => ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
            
        ]);

        if ($errors->fails()) {
            return response()->json(['errors' => $errors->errors()]);
        }


        $userid = auth()->user()->id;
        
        $imgs = $request->file('img');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = "projects" ."_".time()."_".$userid.".".$extension;
        $imgs->move('uploadedimages/projects', $file_name_to_save);
        
        $data = new Project();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image = 'uploadedimages/projects/'.$file_name_to_save;
        $data->save();
        return response()->json(['success' => 'Data Added successfully.']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $project]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $project]);
        }
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
    }

    public function projectupdate(Request $request,Project $project)
    {
        $errors =  Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'img' => ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
            
        ]);

        if ($errors->fails()) {
            return response()->json(['errors' => $errors->errors()]);
        }

        $userid = auth()->user()->id;
        $imgs = $request->file('img');
        //delete img
        File::delete(public_path($project->image));

        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = "projects" ."_".time()."_".$userid.".".$extension;
        $imgs->move('uploadedimages/projects', $file_name_to_save);
        
        $project->title = $request->title;
        $project->description = $request->description;
        $project->image = 'uploadedimages/projects/'.$file_name_to_save;
        $project->save();
        return response()->json(['success' => 'Data Updated successfully.']);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        File::delete(public_path($project->image));
        return response()->json(['success' => $project->delete()]);
    }
}
