<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class CsvUploadController extends Controller
{
    public function index ()
    {
    	return view('project.csv_upload');
    }


	public function csv_upload(Request $request)
{
    $user_id = session('user_id');

    // Validate form fields
    $request->validate([
        'csv_file' => 'required|mimes:csv,txt|max:10240', // Max file size: 10MB
    ]);

    // Handle CSV file upload
    if ($request->hasFile('csv_file')) {
        $file = $request->file('csv_file');
        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));

        // Skip the header row (first row) of the CSV file
        array_shift($rows);

        foreach ($rows as $row) {
            // Check if the row has enough elements
            if (count($row) >= 12) {
                // Process CSV data and insert into the database
                // Assuming the CSV format is: name,father_name,mother_name,dob,number,class_name,roll_number,aadhar_number,samagra_id,address,gender,category,rte
                // You can access CSV data using $row[0], $row[1], etc.

                // Insert data into the database
                DB::table('student')->insert([
                    'user_id' => $user_id,
                    'name' => $row[0],
                    'father_name' => $row[1],
                    'mother_name' => $row[2],
                    'number' => $row[3],
                    'class_name' => $row[4],
                    'roll_number' => $row[5],
                    'aadhar_number' => $row[6],
                    'samagra_id' => $row[7],
                    'address' => $row[8],
                    'gender' => $row[9],
                    'category' => $row[10],
                    'rte' => $row[11],
                    'dob' => $row[12],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            } else {
                // Log an error or handle the incomplete row as appropriate for your use case
                // For example, you can skip the row or log an error message.
                // Logging can help you identify problematic rows in your CSV file.
                // Log::error("Invalid row: " . implode(",", $row));
            }
        }

        return redirect('/student_list');
    }
}
}