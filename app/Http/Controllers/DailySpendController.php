<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailySpend;

class DailySpendController extends Controller
{
    public function index ()
    {
    	$userId = session('user_id');

        // Get daily spend records for the logged-in user
        $dailySpend = DailySpend::where('user_id', $userId)->get();
    	return view('project.daily_spend', compact('dailySpend'));
    }


    public function store (Request $request)
    {
    	// Validate the incoming request data
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        // Get user_id from the authenticated user 
        $userId = session('user_id');

        // Create a new DailySpend instance and fill it with the validated data
        $dailySpend = new DailySpend();
        $dailySpend->description = $request->input('description');
        $dailySpend->amount = $request->input('amount');
        $dailySpend->user_id = $userId;

        // Save the daily spend record to the database
        $dailySpend->save();

        // Redirect to a success page or return a response as needed
        return redirect('/daily_spend');
    }


    public function delete ($id)
    {
    	// Fetch SPEND data based on the $id parameter
	    $dailySpend = DailySpend::find($id);
	    $dailySpend->delete();
	    // Pass the dailySpend data to the view
	    return redirect('/daily_spend');
    }
}
 