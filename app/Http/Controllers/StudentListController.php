<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Fees;
use App\Models\TransportFees;
use App\Models\Student;

class StudentListController extends Controller
{
    public function index ()
    {
    	$userId = session('user_id');
        // Retrieve selected year from session
        $selectedYear = session('selectedYear');

    	// Retrieve fees data for the logged-in user
        $fees = Fees::where('user_id', $userId)->get(); 
        
    	// Retrieve student data for the logged-in user
    	$student = Student::where('user_id',$userId)->where('year',$selectedYear)->get(); 

    	return view('project.student_list', compact('student','fees'));
    }


    private $selectedYear; // Class property to store the selected year

    public function year($selectedYear)
    {
        $this->selectedYear = $selectedYear;
        // You can also perform other operations with $selectedYear if needed
        // Store the selected year in the session
        session(['selectedYear' => $this->selectedYear]);
        return back();
    }



    public function create ()
    {
    	$userId = session('user_id');
        
        // Retrieve fees data for the logged-in user
        $fees = Fees::where('user_id', $userId)->get(); 
        
        // Retrieve transport fees data for the logged-in user
        $transportFees = TransportFees::where('user_id', $userId)->get(); 

        // Pass both sets of data to the 'add_student' view
        return view('project.add_student', compact('fees', 'transportFees')); 
    }

    public function store(Request $request)
    {
    	$userId = session('user_id');
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'class_name' => 'required|string|max:255',
            'roll_number' => 'nullable|integer',
            'aadhar_number' => 'required|integer',
            'samagra_id' => 'required|integer',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'pickup_drop_point' => 'nullable|string|max:255',
           // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = new Student();
        $student->name = $request->input('name');
        $student->father_name = $request->input('father_name');
        $student->mother_name = $request->input('mother_name');
        $student->dob = $request->input('dob');
        $student->number = $request->input('number');
        $student->class_name = $request->input('class_name');
        $student->roll_number = $request->input('roll_number');
        $student->aadhar_number = $request->input('aadhar_number');
        $student->samagra_id = $request->input('samagra_id');
        $student->address = $request->input('address');
        $student->gender = $request->input('gender');
        $student->category = $request->input('category');
        $student->transport_service = $request->input('transport_service');
        $student->pickup_drop_point = $request->input('pickup_drop_point');
        $student->rte = $request->input('rte');
        $student->year = $request->input('year');
        $student->user_id = $userId;

        if ($request->hasFile('image')) {
            // Store the uploaded image in the "upload" folder inside the storage directory
            $imagePath = $request->file('image')->store('upload', 'public');
            $student->image_path = $imagePath;
        }

        $student->save();

        // Redirect or return a response as needed
        return redirect('/student_list');
    }

    public function showStudentDetails($id)
	{
	    // Fetch student data based on the $id parameter
	    $student = Student::find($id);

	    // Pass the student data to the view
	    return view('project.student_details', compact('student'));
	}

	public function edit($id)
	{
		$userId = session('user_id');
		 // Retrieve fees data for the logged-in user
        $fees = Fees::where('user_id', $userId)->get(); 
        
        // Retrieve transport fees data for the logged-in user
        $transportFees = TransportFees::where('user_id', $userId)->get(); 
	    $student = Student::find($id);
    	return view('project.edit_student', compact('student','fees','transportFees'));
	}

	public function update(Request $request, $id)
	{
	    // Fetch the student record by ID
	    $student = Student::find($id);

	    // Update student data from the request
	    $student->update([
	        'name' => $request->input('name'),
	        'father_name' => $request->input('father_name'),
	        'mother_name' => $request->input('mother_name'),
	        'dob' => $request->input('dob'),
	        'number' => $request->input('number'),
	        'class_name' => $request->input('class_name'),
	        'roll_number' => $request->input('roll_number'),
	        'aadhar_number' => $request->input('aadhar_number'),
	        'samagra_id' => $request->input('samagra_id'),
	        'address' => $request->input('address'),
	        'gender' => $request->input('gender'),
	        'category' => $request->input('category'),
	        'transport_service' => $request->input('transport_service'),
	        'pickup_drop_point' => $request->input('pickup_drop_point'),
	        'rte' => $request->input('rte'),
	    ]);

	    // Handle image update if a new image is provided
	    if ($request->hasFile('image')) {
	        // Handle image upload
	        $imagePath = $request->file('image')->store('upload', 'public');
	        
	        // Delete existing image (if any)
	        if ($student->image_path) {
	            Storage::disk('public')->delete($student->image_path);
	        }

	        // Update student's image path
	        $student->update(['image_path' => $imagePath]);
	    }

	    // Redirect to the student list page 
	    return redirect('/student_list');

	}



	 public function deleteStudentDetails($id)
	{
	    // Fetch student data based on the $id parameter
	    $student = Student::find($id);
	    $student->delete();
	    // Pass the student data to the view
	    return redirect('/student_list');
	}

}
