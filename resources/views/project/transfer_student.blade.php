@extends('layouts.main')
@section('main-section')

<div class="contenier">
 <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

       <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

       <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

          <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

  
    <button style=" color: white;
    background: #5cb5b5;
    font-size: 17px;
    border-radius: 16px;
    border: none;
    padding: 15px 20px;
    ;margin-bottom: 15px"><a href="/updateStudentClass" style="text-decoration: none; color:white">Move Student From {{session('selectedYear')}} to {{session('selectedYear') + 1}}</a></button>

    
       <!-- The Modal -->

 <table class="table" id="filterTable" style="display: inline-table; width:100%">

      <thead>

        <tr>

            <th scope="col">No.</th>  

            <th scope="col">Student Name</th>
            
             <th scope="col">Father Name</th>

            <th scope="col">Phone</th>

            <th scope="col">Class</th>

            <th scope="col">Year</th>


        </tr>

      </thead>

      <tbody>

        @php
        $i=1;
        @endphp
        @foreach($student as $students)
          
        <tr>

            <td scope="col">{{$i}}</td>

            <td scope="col">{{$students->name}}</td>
            
            <td scope="col">{{$students->father_name}}</td>

            <td scope="col">{{$students->number}}</td>

            <td scope="col">{{$students->class_name}}</td>

            <td scope="col">{{$students->year}}</td>


     
        </tr>

        @php
        $i++;
        @endphp
        @endforeach

      
         
      </tbody>

    </table>





</div>
   
    </div>
   </body>
</html>


@endsection