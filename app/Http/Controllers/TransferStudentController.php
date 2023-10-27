<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Fees;

class TransferStudentController extends Controller
{
    public function transfer_student ()
    {
    	$user_id = session('user_id');
    	// Retrieve selected year from session
        $selectedYear = session('selectedYear');

    	$fees = Fees::where('user_id',$user_id)->get();
    	$student = Student::where('user_id',$user_id)->where('year',$selectedYear)->get();
    	return view('project.transfer_student', compact('fees', 'student'));
    }
   
	public function updateStudentClass()
	{
	    $user_id = session('user_id');
	    $selectedYear = session('selectedYear');

	    // Get the students that match the given conditions
	    $students = Student::where('user_id', $user_id)
	        ->where('year', $selectedYear)
	        ->get();

	    foreach ($students as $student) {
	    	$currentDataId = Fees::where('user_id', $user_id)
	            ->where('class_name', $student->class_name)
	            ->value('class_id');

	        // Increment the class_id by 1 for the next class
	        $intCurrentDataId = (int)$currentDataId; // Convert the string to an integer
	        $nextDataId = $intCurrentDataId + 1;

	        // Get the next class name based on the incremented class_id
	        $next_class = Fees::where('user_id', $user_id)
	            ->where('class_id', $nextDataId)
	            ->value('class_name');

	            $nextyear = $selectedYear + 1;

	        if ($next_class) {   
		        // Update the class of the current student
		        $student->update(['class_name' => $next_class,'year' => $nextyear]);
	    	}else{

	    	}
	    }

	    return redirect('/transfer_student')->with('success', 'All students updated to the next class.');
	}


}

