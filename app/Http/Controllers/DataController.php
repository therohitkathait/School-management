<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fees;
use App\Models\Student;

class DataController extends Controller
{
     public function index ()
    {
    	$user_id = session('user_id');

    	$class = Fees::where('user_id',$user_id)->get();

    	return view('project.data', compact('class'));
    }


    public function filterStudents(Request $request)
    {
    	$user_id = session('user_id');
        // Retrieve selected year from session
        $selectedYear = session('selectedYear');
        // Retrieve selected columns from the form
        $selectedColumns = [];
        foreach ($request->all() as $key => $value) {
            if ($value == 'on') {
                $selectedColumns[] = $key;
            }
        }
    
        // Retrieve selected values from the form (class, category, gender, and others)
        $class = (array) $request->input('class'); // Ensure $class is an array
        $category = (array) $request->input('scategory'); // Ensure $category is an array
        $gender = (array) $request->input('sgender'); // Ensure $gender is an array
        $rte = $request->input('rte');
    
        // Initialize an empty query
        $query = Student::query();
    
        // Apply filters if they are not empty
        if (!empty($class)) {
            $query->whereIn('class_name', $class);
        }
    
        if (!empty($category)) {
            $query->whereIn('category', $category);
        }
    
        if (!empty($gender)) {
            $query->whereIn('gender', $gender);
        }
    
        if ($rte) {
            $query->where('rte', 1);
        }
        
        // Add condition to filter students based on the selected year
        if (!empty($selectedYear)) {
            $query->where('year', $selectedYear);
        }
        
        // Get the filtered results
        $studentData = $query->get();
    
        $class = Fees::where('user_id', $user_id)->get();
    
        // Pass the selected columns and data to the view
        return view('project.data', compact('studentData', 'class', 'selectedColumns'));
    }
    


}
 



  