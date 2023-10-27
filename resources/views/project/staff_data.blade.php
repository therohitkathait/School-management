@extends('layouts.main')
@section('main-section')

  

    <div class="contenier">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- The Modal -->

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

    xmlhttp.open("GET","staf_view.php?q="+str,true);

    xmlhttp.send();

  }

}

   

</script>

<h2 onload="showUser(this.' ')" class="addst">Staff List <a href="{{url('/add_staff')}}">Add Staff</a></h2>

<table>

  <tr>

     <th>No.</th>  

    <th>Name</th>

     <th>Subject</th>

    <th>Phone</th>

    <th>Adress</th>

    <th>Action</th>

  </tr>
@php
$i =1;
@endphp
@foreach($staff as $staffs)
  <tr>

    <td>{{$i}}</td>

    <td>{{$staffs->name}}</td>

    <td>{{$staffs->designation}}</td>

    <td>{{$staffs->number}}</td>

    <td>{{$staffs->address}}</td>

    <td><a href="{{url('update_staff' . $staffs->id)}}"> <i class="fa fa-edit"></i></a>

     <a href="{{url('/staff_details' . $staffs->id)}}"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" value="80"><i class="fa fa-search"></i></button> 

      <a href="{{url('/delete_staff' . $staffs->id)}}"> <button type="button" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-info btn-lg"><i class="fa-solid fa-trash"></i></button></a>
    </td>

  </tr>

@php
$i++;
@endphp
@endforeach
  
 
  
</table>


</div>
   
    </div>
   </body>
</html>

@endsection