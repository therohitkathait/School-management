<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffDataController extends Controller
{
     public function index ()
    {
    	$userId = session('user_id');

    	// Retrieve staff data for the logged-in user
    	$staff = Staff::where('user_id',$userId)->get(); 

    	return view('project.staff_data',compact('staff'));
    }


      public function create ()
    {
    	return view('project.add_staff');
    }


     public function store (Request $request)
    {
    	
    	$userId = session('user_id');
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'number' => 'required|string|max:255',
            'sallery' => 'required|integer',
            'designation' => 'required',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
        ]);

        $staff = new Staff();
        $staff->name = $request->input('name');
        $staff->father_name = $request->input('father_name');
        $staff->dob = $request->input('dob');
        $staff->number = $request->input('number');
        $staff->address = $request->input('address');
        $staff->gender = $request->input('gender');
        $staff->sallery = $request->input('sallery');
        $staff->designation = $request->input('designation');
        $staff->user_id = $userId;

        if ($request->hasFile('image')) {
            // Store the uploaded image in the "upload" folder inside the storage directory
            $imagePath = $request->file('image')->store('upload', 'public');
            $staff->image_path = $imagePath;
        }

        $staff->save();

        // Redirect or return a response as needed
        return redirect('/staff_data');
    }


    public function showStaffDetails($id)
	{
	    // Fetch staff data based on the $id parameter
	    $staff = Staff::find($id);

	    // Pass the staff data to the view
	    return view('project.staff_details', compact('staff'));
	}


	public function edit($id)
	{
		$userId = session('user_id');
	    $staff = Staff::find($id);
    	return view('project.edit_staff', compact('staff'));
	}


	public function update(Request $request, $id)
	{
	    // Fetch the staff record by ID
	    $staff = Staff::find($id);

	    // Update staff data from the request
	    $staff->update([
	        'name' => $request->input('name'),
	        'father_name' => $request->input('father_name'),
	        'dob' => $request->input('dob'),
	        'number' => $request->input('number'),
	        'address' => $request->input('address'),
	        'gender' => $request->input('gender'),
	        'sallery' => $request->input('sallery'),
	        'designation' => $request->input('designation'),
	    ]);

	    // Handle image update if a new image is provided
	    if ($request->hasFile('image')) {
	        // Handle image upload
	        $imagePath = $request->file('image')->store('upload', 'public');
	        
	        // Delete existing image (if any)
	        if ($staff->image_path) {
	            Storage::disk('public')->delete($staff->image_path);
	        }

	        // Update staff's image path
	        $staff->update(['image_path' => $imagePath]);
	    }

	    // Redirect to the staff list page 
	    return redirect('/staff_data');

	}


	public function delete($id)
	{
	    // Fetch staff data based on the $id parameter
	    $staff = Staff::find($id);
	    $staff->delete();
	    // Pass the staff data to the view
	    return redirect('/staff_data');
	}
}
