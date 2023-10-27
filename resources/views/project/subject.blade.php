@extends('project.setting')
@section('setting-section')

<div id="Tokyo" class="tabcontent">
  <h3>Add Subject</h3>

  <table>

      <tr><td>
        <form action="{{url('/')}}/subject" method="post">
            @csrf
            <input type="text" name="subject" placeholder="Subject" required/>
        </td>
        <td></td>
        <td><input type="submit" name="subjects" value="Add"/>
        </form>
      </td></tr>

      <tr><td>No.</td><td>Subject</td><td>Action</td></tr>

      @php
      $i=1;
      @endphp
      @foreach($subject as $key => $subjects)
            
      <tr>
        <td>{{$i}}</td>
        <td>{{$subjects -> subject}}</td>
       
        <td><a href="{{url('/subject/' . $subjects ->id )}}" href="delete_studentdata.php?stid=" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-info btn-lg"><i class="fa-solid fa-trash"></i></a></td>
      </tr>

        @php
        $i++;
        @endphp
      @endforeach
 
      
  </table>
</div>

@endsection