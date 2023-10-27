@extends('project.setting')
@section('setting-section')


<div id="Paris" class="tabcontent">

    <h3>Add Transport Fees</h3>

    <table>

      	<tr><td>
      		<form action="{{url('/')}}/transport_fees" method="post">
      			@csrf
      			<input type="text" name="place_name" placeholder="Place Name" required/></td><td><input type="text" name="fees" Placeholder="Fees"required/><input type="hidden" name="roll" value="vill" Placeholder="Fees"/></td><td></td><td><input type="submit" name="submits" value="Add"/>
      		</form>
    	</td></tr>

      <tr><td>No.</td><td>Class Name</td><td>Fess</td><td>Action</td></tr>
      @php
      $i = 1;
      @endphp

       @foreach($place as $key => $places)
      <tr>
      	<td>{{$i}}</td>
          <td>{{ $places->place_name }}</td>
          <td>{{ $places->fees }}</td>
        <td>
          <a href="{{url('/transport_fees/' . $places->id)}}">
          <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-info btn-lg"><i class="fa-solid fa-trash"></i></button>
          </a>
        </td>
      </tr>
      @php
      $i++;
      @endphp
        @endforeach
            
    </table>

</div>

@endsection