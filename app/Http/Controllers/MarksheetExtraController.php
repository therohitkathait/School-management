<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarksheetExtra;

class MarksheetExtraController extends Controller
{
    public function storeExtra (Request $request, $id) 
    {
    	$user_id = session('user_id');
    	 // Loop through each subject and save the data to the database
	    $subjects = [
	        'Literary', 'cultural', 'scientificity', 'creative',
	        'sports', 'regularity', 'hygiene', 'dutiful',
	        'cooperation', 'environmental', 'Honesty'
	    ];


	    foreach ($subjects as $subject) {

	    // Check if data exists for this student and subject
        $marksheetExtra = MarksheetExtra::where('student_id', $id)->where('subject', $subject)->first();

        if($marksheetExtra){
        	// Update the existing record
            $marksheetExtra->marks = $request->input($subject);;
            $marksheetExtra->save();
        }else{
        	MarksheetExtra::create([
				        'user_id' => $user_id,
				        'student_id' => $id,
				        'subject' => $subject,
				        'marks' => $request->input($subject),
                ]);
        	}

	    }
 
	    return redirect()->route('marksheet.index', [$id]);
    }
}
