<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolRegister;
use App\Models\Student;
use App\Models\Marksheet;
use App\Models\MarksheetExtra;


class PrintMarksheet extends Controller
{
    public function print ($id)
    {
    	// Retrieve the logged-in user ID from the session
	    $userId = session('user_id');

    	$school = SchoolRegister::where('id', $userId)->first();

    	$student = Student::where('id', $id)->first();

    	$marksheet = Marksheet::where('student_id', $id)->get();

    	$MarksheetExtra = MarksheetExtra::where('student_id', $id)->get();

    	return view('project.print_marksheet', compact('school', 'student', 'marksheet', 'MarksheetExtra'));
    }
}
