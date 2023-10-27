<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fees;
 
class SettingController extends Controller
{
     public function index ()
    {
    	$userId = session('user_id');
        $fees = Fees::where('user_id', $userId)->get();

        return view('project.fees', compact('fees')); // Pass the $fees variable to the view
    }

     public function store (Request $request)
    {
    	$request->validate([
        'class_name' => 'required',
        'fees' => 'required|numeric',
    ]);


    // Extract the integer part of class_name
    $classId = intval(preg_replace('/[^0-9]+/', '', $request->input('class_name')));


    // Create a new Fee instance and store data
    $fee = new Fees();
    $fee->class_name = $request->input('class_name');
    $fee->fees = $request->input('fees');
    $fee->class_id = $classId;
    // Assuming you have the user_id stored in the session, if not, modify this line accordingly
    $fee->user_id = session('user_id');
    $fee->save();

    return redirect('/setting');
	}

	public function delete(Request $request, $id)
    {
        $fee = Fees::find($id);

        $fee->delete();

        return redirect('/setting');
    }
    
}
