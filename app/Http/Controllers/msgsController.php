<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Msg;
use DB;

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
    public function index()
    {
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::all();
        //$posts = Post::orderBy('title', 'desc')->get();
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();

        //$posts = Post::orderBy('title', 'desc')->paginate(1);

        $msgs = Msg::orderBy('id', 'desc')->paginate(2);
        return view('home')->with('msgs', $msgs);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => 'required',
            'msg' => 'required',
           
            
        ]);

        $msg = new msg;
        $msg->name = $request->input('name');
        $msg->email = $request->input('email');
        $msg->subject = $request->input('subject');
        $msg->msg = $request->input('msg');
        $msg->save();

        return redirect('/')->with('success', 'Thanks for Message me . Well get back to you soon');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Msg::find($id);
        return view('adminsite.show')->with('msg',$msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Msg::find($id);
        
       $msg->delete();
       return redirect('/adminsite')->with('success', 'Msg Removed');
    }
}
