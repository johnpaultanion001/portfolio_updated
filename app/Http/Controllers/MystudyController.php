<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mystudy;
use Illuminate\Http\Request;
use DB;
use Mail; 
use DataTables;
use Validator;

class MystudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Mystudy::all();

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" edit="' . $data->id . '" class="edit btn btn-info btn-sm">Edit</button>';
                    $button .= '<button type="button" name="delete" delete="' . $data->id . '" id="' . $data->id . '" class="delete btn btn-danger btn-sm ml-2">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('adminsite.mystudies.mystudies');
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
            'nameofstudy' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Mystudy::create([
            'nameofstudy' => $request->input('nameofstudy'),
        ]);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mystudy  $mystudy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mystudy  $mystudy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Mystudy::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mystudy  $mystudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated =  Validator::make($request->all(), [
            'nameofstudy' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Mystudy::find($id)->update([
            'nameofstudy' => $request->input('nameofstudy'),
            
        
        ]);

        return response()->json(['success' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mystudy  $mystudy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mystudy::findOrFail($id);
        return response()->json(['success' => $data->delete()]);
    }
}
