<!DOCTYPE html>
<html>

<head>   

<meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<script>

function openNav() {

    var WindowWidth = $(window).width();
   if (WindowWidth < 415){

       document.getElementById("mySidenav").style.width = "250px";

  document.getElementById("main").style.marginLeft = "250px";

   }
   else {
       document.getElementById("mySidenav").style.width = "16%";

  document.getElementById("main").style.marginLeft = "16%";
 
   }


 
}



function closeNav() {

  document.getElementById("mySidenav").style.width = "0";

  document.getElementById("main").style.marginLeft= "0";

}

$( document ).ready(function() {
   document.getElementById("mySidenav").style.width = "0";

  document.getElementById("main").style.marginLeft= "0";
});

</script>

<body>

      <div id="mySidenav" class="sidenav">

         

  <a href="javascript:void(0)" class="closebtn"  onclick="closeNav()">&times;</a>

  <a class="username" href="#"><h6>2323508097</h6></a>

  <a href="{{url('/home')}}">Dashbord</a>

  <a href="{{url('/student_list')}}">Student</a>

  <a href="{{url('/staff_data')}}">Staff</a>

  <a href="{{url('/daily_spend')}}">Daily spend</a>

  <a href="{{url('/student_marksheet')}}">Markseet</a>

  <a href="{{url('/setting')}}">Setting</a>

  <a href="{{url('/filter')}}">Fiter Data</a>

  <a href="{{url('/csv_upload')}}">CSV Upload</a>

  <a href="{{url('/transfer_student')}}">Transfer Student to next year</a>

</div>
 


<div id="main">

    

<header>
    <h1>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <a href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        <form method="post" id="yearForm" style="height: 0px; margin: 5px; padding: 0px; text-align: end; margin-right: 13%;">
            @csrf
            <input type="hidden" name="selectedYear" id="selectedYear">
            <select id="myDropdown" name="chngyear" style="position:fixed;top: 15px;padding: 4px 8px; margin-bottom: 20px; background: transparent; border: 1px solid #000;" onchange="updateSelectedYear(this)">
                @php
                $currentYear = date('Y');
                $selectedYear = session('selectedYear');
                @endphp

                @for($year = $currentYear - 1; $year <= $currentYear + 1; $year++)
                    <option value="{{ $year }}" {{ ($year == $selectedYear) ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </form>
    </h1>

    <script>
        function updateSelectedYear(select) {
            var selectedYear = select.value;
            var form = document.getElementById('yearForm');
            var actionUrl = "{{ url('/year') }}/" + selectedYear;
            form.action = actionUrl;
            form.submit(); // Automatically submit the form with the updated action URL
        }
    </script>
</header>

</header>

  
