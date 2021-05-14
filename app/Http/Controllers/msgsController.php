<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Msg;
use DB;
use Mail; 
use DataTables;
use Validator;


class msgsController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store', 'create']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Msg::all();

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" edit="' . $data->id . '" class="edit btn btn-info btn-sm">Edit</button>';
                    $button .= '<button type="button" name="delete" delete="' . $data->id . '" id="' . $data->id . '" class="delete btn btn-danger btn-sm ml-2">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('adminsite.msgs.msgs');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => ['required', 'string', 'email', 'max:255'],
        //     'subject' => 'required',
        //     'msg' => 'required',
           
            
        // ]);
    


        // $msg = new msg;
        // $msg->name = $request->input('name');
        // $msg->email = $request->input('email');
        // $msg->subject = $request->input('subject');
        // $msg->msg = $request->input('msg');
        // $msg->save();

        //email
        //from('john@webslesson.info')->subject('New Customer Equiry')
        // \Mail::send('dynamic_email_template',
        //      array(
        //          'name' => $request->get('name'),
        //          'email' => $request->get('email'),
        //          'subject' => $request->get('subject'),
                 
        //          'msg' => $request->get('msg'),
        //      ), function($message) use ($request)
        //        {
        //           $message->from($request->email);
        //           $message->replyto($request->get('email'));
        //           $message->subject($request->get('subject'));
        //           $message->to('johnpaultanion003@gmail.com');
        //        });

        // return redirect('/')->with('success', 'Thanks for Message me . Well get back to you soon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Msg::findOrFail($id);
            return response()->json(['result' => $data]);
        }
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

            $validated =  Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required','email'],
                'subject' => ['required', 'string', 'max:255'],
                'msg' => ['required', 'string', 'max:255'],
            
            ]);

            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()]);
            }

            Msg::find($id)->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'msg' => $request->input('msg'),
            
            ]);

            return response()->json(['success' => 'Data updated successfully']);
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Msg::findOrFail($id);
        return response()->json(['success' => $msg->delete()]);
    }
}
