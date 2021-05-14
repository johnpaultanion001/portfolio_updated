<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Msg;
use App\Project;
use App\Personal_info;

class DashboardController extends Controller
{
    public function dashboard(){
        $msgs = Msg::all();
        $projects = Project::all();
        $portfolio = Personal_info::where('id', '1')->first();
        $project_new = Project::latest()->first();
        $msg_new = Msg::latest()->first();
       
      
        date_default_timezone_set('Asia/Manila');
        if(date("H") < 12){
        $greetings = "Good Morning!";
        }elseif(date("H") > 11 && date("H") < 18){
        $greetings =  "Good Afternoon!";
        }elseif(date("H") > 17){
        $greetings =  "Good Evening!";
        }

        
        return view('admin.dashboard', compact('msgs','projects','portfolio','project_new','msg_new','greetings'));
    }
}
