<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Personal_info;
use File;
use Validator;

class PortfolioController extends Controller
{
    public function index()
    { 
        $portfolio = Personal_info::where('id', '1')->first();
        return view('admin.portfolio.portfolio', compact('portfolio'));
    }
    public function loadportfolio()
    { 
        $portfolio = Personal_info::where('id', '1')->first();
        return view('admin.portfolio.loadportfolio', compact('portfolio'));
    }

    public function update(Request $request , Personal_info $id)
    {
        $errors =  Validator::make($request->all(), [
            'intro' => ['required', 'string', 'max:255'],
        ]);

        if ($errors->fails()) {
            return response()->json(['errors' => $errors->errors()]);
        }

       
    }

}
