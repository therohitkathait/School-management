<script>
    function calculateMarks() {
        const rows = document.querySelectorAll('.marks-row');
        let totalObtMarks = 0;
        let totalhalfMarks = 0;
        let totalprjMarks = 0;
        let totalgrandMarks = 0;
        let allsummarks = 0;
        rows.forEach(row => {
            const obtMarksInput = row.querySelector('.obtmarks-input');
            const halfYearInput = row.querySelector('.halfyear-input');
            const projectInput = row.querySelector('.project-input');
            const result = row.querySelector('.marks-result');
            const gradeCell = row.querySelector('.marks-grade');

            const obtMarks = parseFloat(obtMarksInput.value) || 0;
            const halfYearMarks = parseFloat(halfYearInput.value) || 0;
            const projectMarks = parseFloat(projectInput.value) || 0;
			
            const sum = obtMarks + halfYearMarks + projectMarks;
            result.textContent = + sum;
				totalMarks =+ sum;
				
            const grade = getGrade(sum);
            gradeCell.textContent = grade;
			totalgrandMarks +=totalMarks
            totalObtMarks += obtMarks;
            totalhalfMarks += halfYearMarks;
            totalprjMarks += projectMarks;
        });
		const overallPercentage = (totalgrandMarks / 600) * 100;
		const overallGrade = getGrade(overallPercentage);
		document.getElementById('overall-grade').textContent = overallGrade;
		document.getElementById('total-marks').textContent = totalgrandMarks;
        document.getElementById('total-obt-marks').textContent = totalObtMarks;
        document.getElementById('total-half-marks').textContent = totalhalfMarks;
        document.getElementById('total-prj-marks').textContent = totalprjMarks;
    }

    function getGrade(marks) {
          if (marks >= 90) {
            return "A+";
        } else if (marks >= 80) {
            return "A";
        } else if (marks >= 60) {
            return "B";
        } else if (marks >= 45) {
            return "C";
        } else if (marks >= 33) {
            return "D";
        } else {
            return "F";
        }
    }
</script>


<div style="float:left;">School Code:- {{$school->scode}}</div>
<div style="float:right;">Reg. {{$school->reg}}</div>

<br>

<p style="text-align:center;">
    School Code:- {{$school->scode}} Reg. {{$school->reg}}</p>

<h1 style="text-align:center;">{{$school->schoolname}}</h1>
<h3 style="text-align:center;">{{$school->year}}</h3>

<br><br>

<table style="width:80%;float: left; margin-bottom: 4%;">
    <tr>
        <td style="width:24%;">school Name</td>
        <td style="width:75%;">{{$school->schoolname}}</td>
    </tr>
    <tr>
        <td style="width:24%;">Roll Number/Samagra</td>
        <td style="width:75%;">{{$student->roll_number}} / {{$student->samagra_id}}</td>
    </tr>
    <tr>
        <td style="width:24%;">Name</td>
        <td style="width:75%;">{{$student->name}}</td>
    </tr>
    <tr>
        <td style="width:24%;">Father Name</td>
        <td style="width:75%;">{{$student->father_name}}</td>
    </tr>
    <tr>
        <td style="width:24%;">Mother Name</td>
        <td style="width:75%;">{{$student->mother_name}}</td>
    </tr>
    <tr>
        <td style="width:24%;">D.O.B</td>
        <td style="width:75%;">{{$student->dob}}</td>
    </tr>
</table>
<img class="dp" src="{{ asset('storage/' . $student->image_path) }}"
 alt="Student Photo" style="float: left;width: 200px;height: 200px;margin-left: 16px;">

<br><br>
<br><br>
<br><br>
<br><br>


<div style="width:100%;">
    <table style="width:60%;height:50%; float:left;">
        <tr>
            <td>Subject</td>
            <td>Total Marks</td>
            <td>Obt Marks(60)</td>
            <td>Half-Yearly<br>Marks(20)</td>
            <td>Project<br>Marks(20)</td>
            <td>Marks Sum</td>
            <td>Grade</td>
        </tr>
<form action="{{url('/add_marksheet/' . $student->id)}}" method="post">
	@csrf
            <tr class="marks-row">
		<td><input type="text" name="subject[Hindi]" value="Hindi " readonly></td>
		<td><input type="number" name="total[Hindi]" value="100" readonly></td>

		@isset($marksheet)
		<td><input type="number" name="obtmarksHindi" class="obtmarks-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Hindi')->first()->obtained_marks ?? 0}}" max="60"></td>
		<td><input type="number" name="halfyearHindi" class="halfyear-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Hindi')->first()->half_yearly_marks ?? 0}}" max="20"></td>
		<td><input type="number" name="projectHindi" class="project-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Hindi')->first()->project_marks ?? 0}}" max="20"></td>

		@else
		<td><input type="number" name="obtmarksHindi" class="obtmarks-input marks-input" oninput="calculateMarks()" value="60" max="60"></td>
		<td><input type="number" name="halfyearHindi" class="halfyear-input marks-input" oninput="calculateMarks()" value="20" max="20"></td>
		<td><input type="number" name="projectHindi" class="project-input marks-input" oninput="calculateMarks()" value="20" max="20"></td>
		@endisset


		<td><p class="marks-result">100</p></td>
		<td class="marks-grade">A+</td>
	</tr>
            <tr class="marks-row">
		<td><input type="text" name="subject[English]" value="English " readonly></td>
		<td><input type="number" name="total[English]" value="100" readonly></td>


		@isset($marksheet)
		<td><input type="number" name="obtmarksEnglish" class="obtmarks-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'English')->first()->obtained_marks ?? 0}}" max="60"></td>
		<td><input type="number" name="halfyearEnglish" class="halfyear-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'English')->first()->half_yearly_marks ?? 0}}" max="20"></td>
		<td><input type="number" name="projectEnglish" class="project-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'English')->first()->project_marks ?? 0}}" max="20"></td>

		@else
		<td><input type="number" name="obtmarksEnglish" class="obtmarks-input marks-input" oninput="calculateMarks()" value="50" max="60"></td>
		<td><input type="number" name="halfyearEnglish" class="halfyear-input marks-input" oninput="calculateMarks()" value="19" max="20"></td>
		<td><input type="number" name="projectEnglish" class="project-input marks-input" oninput="calculateMarks()" value="18" max="20"></td>
		@endisset

		<td><p class="marks-result">87</p></td>
		<td class="marks-grade">A</td>
	</tr>
            <tr class="marks-row">
		<td><input type="text" name="subject[Science]" value="Science " readonly></td>
		<td><input type="number" name="total[Science]" value="100" readonly></td>


		@isset($marksheet)
		<td><input type="number" name="obtmarksScience" class="obtmarks-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Science')->first()->obtained_marks ?? 0}}" max="60"></td>
		<td><input type="number" name="halfyearScience" class="halfyear-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Science')->first()->half_yearly_marks ?? 0}}" max="20"></td>
		<td><input type="number" name="projectScience" class="project-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Science')->first()->project_marks ?? 0}}" max="20"></td>

		@else
		<td><input type="number" name="obtmarksScience" class="obtmarks-input marks-input" oninput="calculateMarks()" value="55" max="60"></td>
		<td><input type="number" name="halfyearScience" class="halfyear-input marks-input" oninput="calculateMarks()" value="19" max="20"></td>
		<td><input type="number" name="projectScience" class="project-input marks-input" oninput="calculateMarks()" value="18" max="20"></td>
		@endisset

		<td><p class="marks-result">92</p></td>
		<td class="marks-grade">A+</td>
	</tr>
            <tr class="marks-row">
		<td><input type="text" name="subject[Maths]" value="Maths " readonly></td>
		<td><input type="number" name="total[Maths]" value="100" readonly></td>


		@isset($marksheet)
		<td><input type="number" name="obtmarksMaths" class="obtmarks-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Maths')->first()->obtained_marks ?? 0}}" max="60"></td>
		<td><input type="number" name="halfyearMaths" class="halfyear-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Maths')->first()->half_yearly_marks ?? 0}}" max="20"></td>
		<td><input type="number" name="projectMaths" class="project-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Maths')->first()->project_marks ?? 0}}" max="20"></td>

		@else
		<td><input type="number" name="obtmarksMaths" class="obtmarks-input marks-input" oninput="calculateMarks()" value="60" max="60"></td>
		<td><input type="number" name="halfyearMaths" class="halfyear-input marks-input" oninput="calculateMarks()" value="20" max="20"></td>
		<td><input type="number" name="projectMaths" class="project-input marks-input" oninput="calculateMarks()" value="20" max="20"></td>
		@endisset

		<td><p class="marks-result">100</p></td>
		<td class="marks-grade">A+</td>
	</tr>
            <tr class="marks-row">
		<td><input type="text" name="subject[Sst]" value="Sst " readonly></td>
		<td><input type="number" name="total[Sst]" value="100" readonly></td>


		@isset($marksheet)
		<td><input type="number" name="obtmarksSst" class="obtmarks-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Sst')->first()->obtained_marks ?? 0}}" max="60"></td>
		<td><input type="number" name="halfyearSst" class="halfyear-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Sst')->first()->half_yearly_marks ?? 0}}" max="20"></td>
		<td><input type="number" name="projectSst" class="project-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'Sst')->first()->project_marks ?? 0}}" max="20"></td>

		@else
		<td><input type="number" name="obtmarksSst" class="obtmarks-input marks-input" oninput="calculateMarks()" value="55" max="60"></td>
		<td><input type="number" name="halfyearSst" class="halfyear-input marks-input" oninput="calculateMarks()" value="20" max="20"></td>
		<td><input type="number" name="projectSst" class="project-input marks-input" oninput="calculateMarks()" value="18" max="20"></td>
		@endisset

		<td><p class="marks-result">93</p></td>
		<td class="marks-grade">A+</td>
	</tr>
            <tr class="marks-row">
		<td><input type="text" name="subject[EVS]" value="EVS " readonly></td>
		<td><input type="number" name="total[EVS]" value="100" readonly></td>


		@isset($marksheet)
		<td><input type="number" name="obtmarksEVS" class="obtmarks-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'EVS')->first()->obtained_marks ?? 0}}" max="60"></td>
		<td><input type="number" name="halfyearEVS" class="halfyear-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'EVS')->first()->half_yearly_marks ?? 0}}" max="20"></td>
		<td><input type="number" name="projectEVS" class="project-input marks-input" oninput="calculateMarks()" value="{{$marksheet->where('subject', 'EVS')->first()->project_marks ?? 0}}" max="20"></td>

		@else
		<td><input type="number" name="obtmarksEVS" class="obtmarks-input marks-input" oninput="calculateMarks()" value="55" max="60"></td>
		<td><input type="number" name="halfyearEVS" class="halfyear-input marks-input" oninput="calculateMarks()" value="20" max="20"></td>
		<td><input type="number" name="projectEVS" class="project-input marks-input" oninput="calculateMarks()" value="18" max="20"></td>
		@endisset

		<td><p class="marks-result">93</p></td>
		<td class="marks-grade">A+</td>
	</tr>
        <tr>
			<td>Grand Total</td>
			<td>600</td>
			<td id="total-obt-marks">335</td>
			<td id="total-half-marks">118</td>
			<td id="total-prj-marks">112</td>
			<td id="total-marks">565</td>
			<td id="overall-grade">A+</td>

		</tr>		
        <tr>
			 <td colspan="7"><input style="padding:5px 60px; margin-left:35%;" type="submit" name="mrksubmit"></td>
        </tr>
   
</form> </table>
<form action="{{url('/add_marksheet_extra/' . $student->id)}}" method="post">
   	@csrf
    <table style="width:40%;height:50%;">
        <thead>
            <tr>
                <td colspan="4" class="center">co-scholastic area</td>
            </tr>
            <tr>
                <th>subject</th>
                <th>marks(100)</th>
                <th>subject</th>
                <th>marks(100)</th>
            </tr>
        </thead>
        <tbody>
        
    @isset($MarksheetExtra)       
	<tr><td>Literary</td><td class="sclrow">
		<input type="number" name="Literary" value="{{$MarksheetExtra->where('subject', 'Literary')->first()->marks ?? 0}}">
	</td>
	<td>cultural</td>
	<td class="sclrow">
		<input type="number" name="cultural" value="{{$MarksheetExtra->where('subject', 'cultural')->first()->marks ?? 0}}">
	</td></tr><td>scientificity</td>
	<td class="sclrow">
		<input type="number" name="scientificity" value="{{$MarksheetExtra->where('subject', 'scientificity')->first()->marks ?? 0}}">
	</td><td>creative</td><td class="sclrow">
		<input type="number" name="creative" value="{{$MarksheetExtra->where('subject', 'creative')->first()->marks ?? 0}}">
	</td><tr><td>sports</td><td class="sclrow">
		<input type="number" name="sports" value="{{$MarksheetExtra->where('subject', 'sports')->first()->marks ?? 0}}">
	</td><td>regularity</td><td class="sclrow">
		<input type="number" name="regularity" value="{{$MarksheetExtra->where('subject', 'regularity')->first()->marks ?? 0}}">
	</td></tr><td>hygiene</td><td class="sclrow">
		<input type="number" name="hygiene" value="{{$MarksheetExtra->where('subject', 'hygiene')->first()->marks ?? 0}}">
	</td><td>dutiful</td><td class="sclrow">
		<input type="number" name="dutiful" value="{{$MarksheetExtra->where('subject', 'dutiful')->first()->marks ?? 0}}">
	</td><tr><td>cooperation</td><td class="sclrow">
		<input type="number" name="cooperation" value="{{$MarksheetExtra->where('subject', 'cooperation')->first()->marks ?? 0}}">
	</td><td>environmental</td><td class="sclrow">
		<input type="number" name="environmental" value="{{$MarksheetExtra->where('subject', 'environmental')->first()->marks ?? 0}}">
	</td></tr><tr><td>Honesty</td><td class="sclrow">
		<input type="number" name="Honesty" value="{{$MarksheetExtra->where('subject', 'Honesty')->first()->marks ?? 0}}">
	</td><td colspan="2"> <input style="padding:5px 30px; margin-left:25%;" type="submit" name="sclsubmit" value="socialSubmit"></td></tr>

	@else
	<tr><td>Literary</td><td class="sclrow">
		<input type="number" name="Literary" value="90">
	</td>
	<td>cultural</td>
	<td class="sclrow">
		<input type="number" name="cultural" value="90">
	</td></tr><td>scientificity</td>
	<td class="sclrow">
		<input type="number" name="scientificity" value="84">
	</td><td>creative</td><td class="sclrow">
		<input type="number" name="creative" value="81">
	</td><tr><td>sports</td><td class="sclrow">
		<input type="number" name="sports" value="86">
	</td><td>regularity</td><td class="sclrow">
		<input type="number" name="regularity" value="87">
	</td></tr><td>hygiene</td><td class="sclrow">
		<input type="number" name="hygiene" value="87">
	</td><td>dutiful</td><td class="sclrow">
		<input type="number" name="dutiful" value="88">
	</td><tr><td>cooperation</td><td class="sclrow">
		<input type="number" name="cooperation" value="88">
	</td><td>environmental</td><td class="sclrow">
		<input type="number" name="environmental" value="88">
	</td></tr><tr><td>Honesty</td><td class="sclrow">
		<input type="number" name="Honesty" value="90">
	</td><td colspan="2"> <input style="padding:5px 30px; margin-left:25%;" type="submit" name="sclsubmit" value="socialSubmit"></td></tr>
	@endisset
     </tbody>
    </table>
   
</form>

	</div>
   


<br><br><br><br>

<br><br>

<div style="float:left;">Class Teacher Signature</div>
<div style="float:right;">Principal Signature</div>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
	.marks-row input , .sclrow input{
		width:100;
	}
</style>