@extends('layouts.main')
@section('main-section')

     


<div class="contenier">                

  <div class="box_wrap">

    <div class="box30">
      <div class="icon-box"><i class="fa-solid fa-user-graduate"></i></div>
      <h1>{{$student}}</h1><span>Total Students</span>
    </div>

    <div class="box30">
      <div class="icon-box"><i class="fa-solid fa-user-group"></i></div>
      <h1>{{$staff}}</h1><span>Total Staff</span>
    </div>

    <div class="box30">
      <div class="icon-box"><i class="fa-solid fa-money-bill-transfer"></i></div>
      <h1>{{$DailySpend}}</h1><span>Total Spend</span>
    </div>
                
  </div>

    <div class="Fessstatment" style="margin-top: 0px;">

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

      

      

          

   

</script>




<div id="txtHint">

  <div class="fess_list">

    <h3>Transport Amount</h3>

   


</div>

<table class="table" id="filterTable" style="display: inline-table; width:100%">

 <thead>

  <tr>

        <th scope="col">No</th>

        <th scope="col">Place</th>

        <th scope="col">Fees</th>

        

        <th scope="col">Action</th>

  </tr>

 </thead>

 <tbody>


@php
$i=1;
@endphp
@foreach($TransportFee as $TransportFees)

    <tr>

        <td scope="col">{{$i}}</td>

        <td scope="col">{{$TransportFees->place_name}}</td>

        <td scope="col">{{$TransportFees->fees}}</td>

        <td scope="col">  <a href="{{url('/delete_home/'. $TransportFees->id)}}" title="Delete"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-info btn-lg"> 
      <i class="fa-solid fa-trash"></i></a> 
</td>

    </tr>
@php
$i++
@endphp
@endforeach

  
 </tbody>

</table></div>

</div>
<div class="rightdailykharch">


<div class="fess_list">

    <h3>Daily Spend</h3>

   


</div>

<div id="txtHint">

<table class="table" id="filterTables" style="width:90%">

 <thead>

  <tr>

        <th scope="col">No</th>

        <th scope="col">Description</th>

        <th scope="col">Date</th>

        <th scope="col">Amount</th>

        

  </tr>

 </thead>

 <tbody>

@php
$i=1;
@endphp
@foreach($SpendData as $SpendDatas)
    <tr>

        <td scope="col">{{$i}} </td>

        <td scope="col">{{$SpendDatas->description}}</td>

        <td scope="col">{{$SpendDatas->created_at}}</td>

        <td scope="col">{{$SpendDatas->amount}}</td>

      

    </tr>
  @php
  $i++;
  @endphp
  @endforeach

  
 </tbody>

</table></div>

</div>

     </div>

  <!-- Modal -->
  

  <script>

  $("document").ready(function () {





      $("#filterTable").dataTable({

        "pageLength": 10,

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

     

$("#filterTables").dataTable({

        "pageLength": 10,

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

     


      table.draw();

    });

</script>


                </div>

                </body>

</html>



@endsection