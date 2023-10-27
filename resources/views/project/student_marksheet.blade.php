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

    <script>

function showUserr(str) {

  if (str == "") {

    document.getElementById("txtHintt").innerHTML = this.responseText;

    return;

  } else {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        document.getElementById("txtHintt").innerHTML = this.responseText;

      }

    };

    xmlhttp.open("GET","add_marksheet.php?q="+str,true);

    xmlhttp.send();

  }

}
</script> 
<h2 class="addst">Student Marksheet</h2>

<div class="filter">

    

      <div class="category-filter">

      <select id="categoryFilter" class="form-control">

       <option value="">Show All</option>
       @foreach($fee as $fees)
            <option value="1st">{{$fees->class_name}}</option>

        @endforeach   

      </select>

    </div>

</div>

       <!-- The Modal -->

 <table class="table" id="filterTable" style="display: inline-table; width:100%">

      <thead>

        <tr>

            <th scope="col">No.</th>  

            <th scope="col">Student Name</th>

            <th scope="col">Phone</th>

            <th scope="col">Class</th>

            <th scope="col">Action</th>

        </tr>

      </thead>

      <tbody>

        @php
        $i = 1;
        @endphp
        @foreach($student as $students)
          
        <tr>

            <td scope="col">{{$i}}</td>

            <td scope="col">{{$students->name}}</td>

            <td scope="col">{{$students->number}}</td>

            <td scope="col">{{$students->class_name}}</td>

            <td scope="col">

   <a target="_blank" href="{{url('/add_marksheet' . $students->id)}}" > <i class="fa fa-plus"></i></a> 


    <a href="{{url('/print_marksheet/' . $students->id)}}"  class="idcard btn btn-info btn-lg" title="Print Marksheet"> <i class="fa-solid fa-medal"></i></a> 
   </td>

        </tr>
      
      @php
      $i++;
      @endphp
      @endforeach

        
      </tbody>

    </table>

  
<script>

  $("document").ready(function () {



      $("#filterTable").dataTable({

        "searching": true,

         dom: 'Bfrtip',

        buttons: [

        {

            extend: 'pdf',

            text: 'Download Pdf',

            exportOptions: {

                modifier: {

                    page: 'current'

                }

            }

        }

    ]

      });



      //Get a reference to the new datatable

      var table = $('#filterTable').DataTable();



      //Take the category filter drop down and append it to the datatables_filter div. 

      //You can use this same idea to move the filter anywhere withing the datatable that you want.

      $("#filterTable_filter.dataTables_filter").append($("#categoryFilter"));

      

      //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)

      //This tells datatables what column to filter on when a user selects a value from the dropdown.

      //It's important that the text used here (Category) is the same for used in the header of the column to filter

      var categoryIndex = 0;

      $("#filterTable th").each(function (i) {

        if ($($(this)).html() == "Class") {

          categoryIndex = i; return false;

        }

      });



      //Use the built in datatables API to filter the existing rows by the Category column

      $.fn.dataTable.ext.search.push(

        function (settings, data, dataIndex) {

          var selectedItem = $('#categoryFilter').val()

          var category = data[categoryIndex];

          if (selectedItem === "" || category.includes(selectedItem)) {

            return true;

          }

          return false;

        }

      );



      //Set the change event for the Category Filter dropdown to redraw the datatable each time

      //a user selects a new filter.

      $("#categoryFilter").change(function (e) {

        table.draw();

      });



      table.draw();

    });

</script>

</div>
   
    </div>
   </body>
</html>

@endsection