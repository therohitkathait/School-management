<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fees;
use App\Models\Student;
use App\Models\SchoolRegister;
use App\Models\Marksheet;
use App\Models\MarksheetExtra;

class StudentMarksheetController extends Controller
{
     public function index ()
    {
    	$user_id = session('user_id');
        $selectedYear = session('selectedYear');

    	$fee = Fees::where('user_id', $user_id)->get();

    	$student = Student::where('user_id', $user_id)->where('year', $selectedYear)->get();


    	return view('project.student_marksheet', compact('fee', 'student'));
    }


    public function add ($id)
    {
    	$user_id = session('user_id');

    	// Find the student by the given ID and user_id
   		$student = Student::where('user_id', $user_id)->where('id', $id)->first();

    	$school = SchoolRegister::where('id', $user_id)->first();

   		$marksheet = Marksheet::where('student_id', $id)->get();

   		$MarksheetExtra = MarksheetExtra::where('student_id', $id)->get();

   		if($marksheet->count() > 0 ) {
   			return view('project.add_marksheet', compact('student', 'school', 'marksheet', 'MarksheetExtra'));
   		}else{
   			return view('project.add_marksheet', compact('student', 'school'));
   		}

    }


    public function store (Request $request, $id)
    {
    	$user_id = session('user_id');

    	$subjects = $request->input('subject');
        foreach ($subjects as $subject => $subject_name) {
           

            // Check if data exists for this student and subject
            $marksheetData = Marksheet::where('student_id', $id)
                ->where('subject', $subject)
                ->first();
            
            if ($marksheetData) {
                // Update the existing record
                $marksheetData->obtained_marks = $request->input('obtmarks' . $subject);;
                $marksheetData->half_yearly_marks = $request->input('halfyear' . $subject);
                $marksheetData->project_marks = $request->input('project' . $subject);
                $marksheetData->save();
            } else {
				    // Insert a new record
				    Marksheet::create([
				        'user_id' => $user_id,
				        'student_id' => $id,
				        'subject' => $subject_name,
				        'obtained_marks' => $request->input('obtmarks' . $subject),
				        'haslf_yearly_marks' => $request->input('halfyear' . $subject),
				        'project_marks' => $request->input('project' . $subject),

                ]);
			}		
        }

        
        return redirect()->route('marksheet.index', [$id]);
    }


       

}
