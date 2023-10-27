<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School_Profile;
use App\Models\SchoolRegister;

class SchoolProfileController extends Controller
{
   public function index()
	{
	    // Retrieve the logged-in user ID from the session
	    $userId = session('user_id');

	    // Retrieve school details for the logged-in user only
	    $school_detail = SchoolRegister::where('id', $userId)->first();

	    // Pass the retrieved data to the view
	    return view('project.school_profile', compact('school_detail'));
	}

	 public function updateDetail(Request $request)
    {
        // Retrieve the logged-in user ID from the session
        $userId = session('user_id');

        // Validate form data
        $request->validate([
            'schoolname' => 'required|string',
            'reg' => 'required|string',
            'dise_code' => 'required|string',
            'school_address' => 'required|string',
        ]);

        // Update school details for the logged-in user
        SchoolRegister::where('id', $userId)->update([
            'schoolname' => $request->input('schoolname'),
            'reg' => $request->input('reg'),
            'dise_code' => $request->input('dise_code'),
            'school_address' => $request->input('school_address'),
        ]);

        // Redirect back to the form with a success message
        return redirect('/school_profile');
    }

    public function updatePassword (Request $request)
    {
    	 $userId = session('user_id');

    	// Validate form data, including the new password
    	$request->validate([
        'password' => 'required|string|min:6', // Minimum 6 characters for the password
    	]);

    	// Update the password for the logged-in user
    	SchoolRegister::where('id', $userId)->update([
        'password' => bcrypt($request->input('password')), // Hash the password before saving it
    	]);

    	// Redirect back to the form with a success message
    	return redirect('/school_profile');
    }
}
