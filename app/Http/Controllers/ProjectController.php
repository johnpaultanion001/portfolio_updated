<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;

use DB;
use Mail; 
use File; // For File

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $projects = Project::orderBy('id', 'desc')->paginate(6);
        return view('adminsite/projects/all.index')->with('projects', $projects);
       
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminsite/projects/all.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|nullable|max:1999',
            'uiimage1' => 'image|nullable|max:1999',
            'uiimage2' => 'image|nullable|max:1999',
            'uiimage3' => 'image|nullable|max:1999',
            'uiimage4' => 'image|nullable|max:1999',
            'uiimage5' => 'image|nullable|max:1999'
            
        ]);


        $project = new Project;
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->ui_title1 = $request->input('ui_title1');
        $project->ui_title2 = $request->input('ui_title2');
        $project->ui_title3 = $request->input('ui_title3');
        $project->ui_title4 = $request->input('ui_title4');
        $project->ui_title5 = $request->input('ui_title5');
    
        if($request->hasFile('image')){
            //Get filename with the ext
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'image'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->image = $filenameToStore;
        }

        if($request->hasFile('uiimage1')){
                //Get filename with the ext
                $filenameWithExt = $request->file('uiimage1')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('uiimage1')->getClientOriginalExtension();
                //Filename to store
                $filenameToStore=$filename.'_'.'uiimage1'.time().'.'.$extension;
                //Upload Image
                $path = $request->file('uiimage1')->move(public_path('/uploadedimages'), $filenameToStore);
                $project->uiimage1 = $filenameToStore;
        }
        else{
            $filenameToStore = 'noimage.jpg';
            $project->uiimage1 = $filenameToStore;

        }
        

        if($request->hasFile('uiimage2')){
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage2')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage2')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage2'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage2')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage2 = $filenameToStore;
           
        }
        else{
            $filenameToStore = 'noimage.jpg';
            $project->uiimage2 = $filenameToStore;

         }

         if($request->hasFile('uiimage3')){
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage3')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage3')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage3'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage3')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage3 = $filenameToStore;
           
        }
        else{
            $filenameToStore = 'noimage.jpg';
            $project->uiimage3 = $filenameToStore;

         }

         if($request->hasFile('uiimage4')){
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage4')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage4')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage4'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage4')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage4 = $filenameToStore;
           
        }
        else{
            $filenameToStore = 'noimage.jpg';
            $project->uiimage4 = $filenameToStore;

         }

         if($request->hasFile('uiimage5')){
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage5')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage5')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage5'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage5')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage5 = $filenameToStore;
           
        }
        else{
            $filenameToStore = 'noimage.jpg';
            $project->uiimage5 = $filenameToStore;

         }
     
        $project->save();

        return redirect('/adminsite/projects/all')->with('success', 'Inserted A New Project');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('/show')->with('project',$project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $project = Project::find($id);
        return view('adminsite/projects/all.edit')->with('project',$project);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
            

        ]);

        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->ui_title1 = $request->input('ui_title1');
        $project->ui_title2 = $request->input('ui_title2');
        $project->ui_title3 = $request->input('ui_title3');
        $project->ui_title4 = $request->input('ui_title4');
        $project->ui_title5 = $request->input('ui_title5');


    if($request->hasFile('image')){

        if($project->image != 'noimage.jpg'){
             File::delete(public_path('uploadedimages/'.$project->image));
             }


            //Get filename with the ext
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'image'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('image')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->image = $filenameToStore;
      }
       

    if($request->hasFile('uiimage1')){

        if($project->uiimage1 != 'noimage.jpg'){
            File::delete(public_path('uploadedimages/'.$project->uiimage1));
            }
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage1')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage1')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage1'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage1')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage1 = $filenameToStore;
      }
    
    if($request->hasFile('uiimage2')){

        if($project->uiimage2 != 'noimage.jpg'){
            File::delete(public_path('uploadedimages/'.$project->uiimage2));
            }
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage2')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage2')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage2'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage2')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage2 = $filenameToStore;
    }

    if($request->hasFile('uiimage3')){

        if($project->uiimage3 != 'noimage.jpg'){
            File::delete(public_path('uploadedimages/'.$project->uiimage3));
            }
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage3')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage3')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage3'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage3')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage3 = $filenameToStore;
    }

    if($request->hasFile('uiimage4')){

        if($project->uiimage4 != 'noimage.jpg'){
            File::delete(public_path('uploadedimages/'.$project->uiimage4));
            }
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage4')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage4')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage4'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage4')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage4 = $filenameToStore;
    }

    if($request->hasFile('uiimage5')){

        if($project->uiimage5 != 'noimage.jpg'){
            File::delete(public_path('uploadedimages/'.$project->uiimage5));
            }
            //Get filename with the ext
            $filenameWithExt = $request->file('uiimage5')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('uiimage5')->getClientOriginalExtension();
            //Filename to store
            $filenameToStore=$filename.'_'.'uiimage5'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('uiimage5')->move(public_path('/uploadedimages'), $filenameToStore);
            $project->uiimage5 = $filenameToStore;
    }



      

     
      

      $project->save();

      return redirect('/adminsite/projects/all')->with('success', 'Project Information Updated');





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $project = Project::find($id);
        

        if($project->image != 'noimage.jpg'){
            //delete img
            File::delete(public_path('uploadedimages/'.$project->image));
        }
        if($project->uiimage1 != 'noimage.jpg'){
            //delete img
            File::delete(public_path('uploadedimages/'.$project->uiimage1));
        }
        if($project->uiimage2 != 'noimage.jpg'){
            //delete img
            File::delete(public_path('uploadedimages/'.$project->uiimage2));
        }
        if($project->uiimage3 != 'noimage.jpg'){
            //delete img
            File::delete(public_path('uploadedimages/'.$project->uiimage3));
        }
        if($project->uiimage4 != 'noimage.jpg'){
            //delete img
            File::delete(public_path('uploadedimages/'.$project->uiimage4));
        }
        if($project->uiimage5 != 'noimage.jpg'){
            //delete img
            File::delete(public_path('uploadedimages/'.$project->uiimage5));
        }
        
        $project->delete();
        return redirect('/adminsite/projects/all')->with('success', 'Project Removed');
    }
}
