<?php
if(count($marksheet) > 0){
$html = "<div style=\"float:left;\">School Code:- $school->scode</div><div style=\"float:right;\">Reg. $school->reg</div>
<br>
<p style=\"text-align:center;\">School Code:- $school->scode Reg.$school->reg</p>
<h1 style=\"text-align:center;\">$school->schoolname</h1>
<h3 style=\"text-align:center;\">$school->year</h3>
<br><br> 
<table style=\"width:80%;float: left;\">
	<tr><td>Name:-$student->name </td><td>Father Name:- $student->father_name</td></tr>
	<tr><td>Mother Name:-$student->mother_name</td><td>Roll Number:- $student->roll_number</td></tr>
	<tr><td>D.O.B:- $student->dob</td><td>category:- $student->category	</td></tr>
	<tr><td>Class:- $student->class_name</td><td>Samagra id:- $student->samagra_id</td></tr>
</table>
<img src=" . asset('storage/' . $student->image_path) ." style=\"float: left;height:100px; width: 100px; margin-left: 16px;\">

<br><br>
<br><br>	
<br><br>";

 $html .= "<table style=\"width:61%\">
	<tr>
        <th>No. </th>
        <th>Subject</th>
        <th>Total Marks</th>
        <th>Obt Marks</th>
        <th>Halfyearly<br> Marks</th>
        <th>Project Marks</th>
        <th>Marks sum</th>
        <th>Grade</th>
    </tr>";			
  
    $i=1;
    $total_obtained_marks = 0;
    $total_half_yearly_marks = 0;
    $total_project_marks = 0;
    $grand_total = 0;
    foreach($marksheet as $marksheets)
    {
    	$marks_sum = $marksheets->obtained_marks + $marksheets->half_yearly_marks + $marksheets->project_marks;

    	$grade = "";
    	if ($marks_sum >= 90) {
            $grade = "A+";
        } else if ($marks_sum >= 80) {
            $grade = "A";
        } else if ($marks_sum >= 60) {
            $grade = "B";
        } else if ($marks_sum >= 45) {
            $grade = "C";
        } else if ($marks_sum >= 33) {
            $grade = "D";
        } else {
            $grade = "F";
        }
    $html .= "<tr>
       <td>$i</td>
        <td>$marksheets->subject</td>
        <td>100</td>
        <td>$marksheets->obtained_marks</td>
        <td>$marksheets->half_yearly_marks<br> Marks</td>
        <td>$marksheets->project_marks</td>
        <td>$marks_sum</td>
        <td>$grade</td>
    </tr>";

    // Determine the grade for the grand total
	
    $i++;
    $total_obtained_marks += $marksheets->obtained_marks;
    $total_half_yearly_marks += $marksheets->half_yearly_marks;
    $total_project_marks += $marksheets->project_marks;
    $grand_total += $marks_sum;

    $grand_total_grade = "";
	if ($grand_total/6 >= 90) {
	    $grand_total_grade = "A+";
	} else if ($grand_total/6 >= 80) {
	    $grand_total_grade = "A";
	} else if ($grand_total/6 >= 60) {
	    $grand_total_grade = "B";
	} else if ($grand_total/6 >= 45) {
	    $grand_total_grade = "C";
	} else if ($grand_total/6 >= 33) {
	    $grand_total_grade = "D";
	} else {
	    $grand_total_grade = "F";
	}

	$result = "";
	if($grand_total_grade == "F"){
		$result = 'FAIL';
	}else{
		$result = 'PASS';
	}
}


$html .= "</table>
    <br><br>
    <table style=\"width:90%;margin:0,auto;\">
        <tr>
            <th>Total Marks</th>
            <th>Total Obtained Marks</th>
            <th>Total Halfyearly Marks</th>
            <th>Total Project Marks</th>
            <th>Grand Total</th>
            <th>Grade</th>
        </tr>";


  $html .= "<tr>
           <td>600</td>
            <td>$total_obtained_marks</td>
            <td>$total_half_yearly_marks</td>
            <td>$total_project_marks</td>
            <td>$grand_total</td>
            <td>$grand_total_grade</td>
        </tr>
        
    </table>
    <div>
         Student's Final Result is: $result
    </div>    

<table style=\"width:39%; height:30%;float:right;margin-top:-370px\">
<tr>
 <td colspan=4>co-scholastic area</td>
</tr>
<tr>
    <th>Subject</th>
    <th>Marks</th>
    <th>Subject</th>
    <th>Marks</th>		
</tr>";

$columnCount = 0; // Counter to keep track of columns

foreach ($MarksheetExtra as $MarksheetExtras) {
    // Start a new row after every 2 columns
    if ($columnCount % 2 == 0) {
        $html .= "<tr>";
    }

    // Add the data for each column
    $html .= "<td>$MarksheetExtras->subject</td>
              <td>$MarksheetExtras->marks</td>";

    // End the row after every 2 columns
    if ($columnCount % 2 != 0) {
        $html .= "</tr>";
    }

    $columnCount++;
}

// Close any open row if the number of columns is odd
if ($columnCount % 2 != 0) {
    $html .= "<td></td><td></td></tr>"; // Fill the empty columns
}

$html .= "</table>
<br><br><br><br>

<br><br><br><br> 

<div style=\"float:left;\">Class Teacher Signature</div><div style=\"float:right;\">Principal Signature</div>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>";
	
//$filename = "marksheet";
echo $html;
echo '<button id="printButton" style="position:fixed;top:100px;right:10px; color: white;
    background: #5cb5b5;
    font-size: 17px;
    border-radius: 16px;
    border: none;
    padding: 15px 28px;
    margin: 0px;">Print Marksheet</button>';

echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){
    $(\'#printButton\').on(\'click\', function(){
        window.print(); // Open the browser\'s print dialog when the button is clicked
    });
});
</script>';
}else {
    echo '<form action="' . url('/add_marksheet' . $student->id) . '" method="GET">
        <h1>You did not created marksheet for this student please create it first</h1>
        <button type="submit">Create Marksheet</button>
    </form>';
}


