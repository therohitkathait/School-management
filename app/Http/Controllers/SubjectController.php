<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
     public function index ()
    {
    	$userId = session('user_id');
    	$subject = Subject::where('user_id', $userId)->get();
    	return view('project.subject', compact('subject'));
    }

    public function store (Request $request)
    {
    	$request->validate([
    		'subject' => 'required',
    	]);
    	//create a new instance 
    	$subject = new Subject;
    	$subject->subject = $request->input('subject');

   		$subject->user_id = session('user_id');
    	$subject->save();

    	return redirect('/subject');

    }

    public function delete (Request $request, $id)
    {
    	$subject = Subject::find($id);
    	$subject->delete();

    	return redirect('/subject');	
    }
}
  