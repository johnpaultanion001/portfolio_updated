<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Msg;
use App\Project;
use App\personal_info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $msgs = Msg::all();
        $projects = Project::all();

        $personal_infos = personal_info::where('id', '1')
                                        ->get();

        return view('dashboard',['msgs'=>$msgs , 'projects'=>$projects , 'personal_infos'=>$personal_infos]);


       
       
    }

}
