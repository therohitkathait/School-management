@extends('project.setting')
@section('setting-section')

<div id="London" class="tabcontent">

  <h3>Add Class & Fees</h3>

  <table id="feesTable">

      <tr><td>
        <form action="{{url('/')}}/setting" method="post">
          @csrf
          <input type="text" name="class_name" placeholder="Class Name" required/></td><td>
          <input type="text" name="fees" Placeholder="Fees" required/></td><td>
          <input type="submit" name="submit" value="Add"/>
        </form>
      </td></tr>

      <tr><th>Class Name</th><th>Fess</th><th>Action</th></tr>

            
      @foreach($fees as $key => $fee)
      
      <tr>
          <td>{{ $fee->class_name }}</td>
          <td>{{ $fee->fees }}</td>
        <td>
          <a href="{{url('/setting/' . $fee->id)}}" >
          <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-info btn-lg"><i class="fa-solid fa-trash"></i></button>
          </a>
        </td>
      </tr>
        @endforeach
      
      
  </table>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script>
      $(document).ready(function () {
  $('#feesTable tbody')
    .sortable({
      helper: fixHelperModified,
      update: function (event, ui) {
        // Get the updated order
        var order = [];
        $('#feesTable tbody tr').each(function () {
          order.push($(this).data('id'));
        });

        // Send the updated order to the server
        $.ajax({
          url: 'update-order.php',
          type: 'POST',
          data: { order: order },
          success: function (response) {
            console.log(response); // Log success message
          },
          error: function (xhr, status, error) {
            console.log(error); // Log error message
          },
        });
      },
    })
    .disableSelection();

  function fixHelperModified(e, tr) {
    var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function (index) {
      $(this).width($originals.eq(index).width());
    });
    return $helper;
  }
});
    </script>
@endsection