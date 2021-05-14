<?php

namespace App\Http\Controllers;

use App\Contactinfo;
use App\Category;
use Illuminate\Http\Request;
use DB;
use Mail; 
use DataTables;
use Validator;

class ContactinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contactinfo::all();

            return DataTables::of($data)
                ->addColumn('category', function ($data) {
                    return $data->category ? $data->category['name'] : 'Deleted';
                })
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" edit="' . $data->id . '" class="edit btn btn-info btn-sm">Edit</button>';
                    $button .= '<button type="button" name="delete" delete="' . $data->id . '" id="' . $data->id . '" class="delete btn btn-danger btn-sm ml-2">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $categories = Category::all();
        return view('adminsite.contactinfos.contactinfos')->with(compact(['categories']));
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
        $validated =  Validator::make($request->all(), [
            'category_id' => ['required'],
            'valueofcontact' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Contactinfo::create([
            'category_id' => $request->input('category_id'),
            'valueofcontact' => $request->input('valueofcontact'),
        ]);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Contactinfo $contactinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Contactinfo::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated =  Validator::make($request->all(), [
            'category_id' => ['required'],
            'valueofcontact' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Contactinfo::find($id)->update([
            'category_id' => $request->input('category_id'),
            'valueofcontact' => $request->input('valueofcontact'),
            
        
        ]);

        return response()->json(['success' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contactinfo  $contactinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contactinfo::findOrFail($id);
        return response()->json(['success' => $data->delete()]);
    }
}
