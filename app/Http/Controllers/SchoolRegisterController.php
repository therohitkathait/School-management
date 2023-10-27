<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolRegister;

class SchoolRegisterController extends Controller
{
	
    public function register ()
    {
        return view('project.register');
    }
 

    public function store (Request $request)
    {
    	$request->validate([
            'schoolname' => 'required|string|max:255',
            'uname' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'reg' => 'required|string|max:255',
            'dise_code' => 'required|string|max:255',
            'scode' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

    	$register = new SchoolRegister;
        $register->schoolname = $request->input('schoolname');
        $register->uname = $request->input('uname');
        $register->password = bcrypt($request->input('password'));
        $register->reg = $request->input('reg');
        $register->dise_code = $request->input('dise_code');
        $register->scode = $request->input('scode');
        $register->school_address = $request->input('school_address');
        $register->year = $request->input('year');

        // Save the data to the database
        $register->save();

        // Redirect to a success page or return a response
        return redirect('/');
    }
}
