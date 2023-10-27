<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\DailySpend;
use App\Models\Staff;
use App\Models\TransportFees;

class HomeController extends Controller
{
    public function index ()
    {
    	$user_id = session('user_id');
        $selectedYear = session('selectedYear');

    	$student = Student::where('user_id',$user_id)->where('year',$selectedYear)->count(); 

    	$DailySpend = DailySpend::where('user_id',$user_id)->sum('amount');  
    	$SpendData = DailySpend::where('user_id',$user_id)->get();  

    	$staff = Staff::where('user_id',$user_id)->count(); 

    	$TransportFee = TransportFees::where('user_id',$user_id)->get();  


    	return view('project.home', compact('student', 'DailySpend', 'SpendData', 'staff', 'TransportFee'));
    }


    public function delete($id)
	{
	    $transportFee = TransportFees::find($id);
	    
	    $transportFee->delete();

	    return redirect('/home');
	}

}
