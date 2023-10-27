@extends('layouts.main')
@section('main-section')


    <div class="contenier">
                

                <script>

  var loadFile = function(event) {

    var output = document.getElementById('output');

    output.src = URL.createObjectURL(event.target.files[0]);

    output.onload = function() {

      URL.revokeObjectURL(output.src) // free memory

    }

  };

</script>
<style type="text/css">
  button.ff50 {
    position: fixed;
    bottom: -68px;
    right: 0px;
    width: 200px;
}
</style>

        <div class="staffform">

        <form action="{{url('/update_staff'. $staff->id)}}" id="example_form1" method="post" enctype="multipart/form-data">
        	@csrf

        <div class="title">

          <i class="fas fa-pencil-alt"></i> 

          <h2>Staff Update Form</h2>

        </div>

        <div class="info">

            <div class="imgupload">
			    @if($staff->image_path)
			        <img id="output" src="{{ asset('storage/' . $staff->image_path) }}" alt="Current Image" />
			    @else
			        <img id="output" src="{{ asset('default-image.jpg') }}" alt="Default Image" />
			    @endif
			    <input type="file" name="image" accept="image/*" onchange="loadFile(event)">
			    <p style="color:red;"></p>
			</div>


          <input class="fname ff50" type="text" name="name" value="{{$staff->name}}" placeholder="Full name" required >

          <input class="ff50" type="text" name="father_name" value="{{$staff->father_name}}" placeholder="Father Name" required >

           <input class="ff50" type="DATE" name="dob" value="{{$staff->dob}}" placeholder="(dd/mm/yyyy)Date of birth" required >

          <input class="ff50" type="Number" name="number" value="{{$staff->number}}" placeholder="Mobile Number" required >
      

             <input class="ff50" type="text" name="address" value="{{$staff->address}}" placeholder="Adress" required >



             <input class="ff50" type="text" name="designation" value="{{$staff->designation}}" placeholder="Designation" required >

             <input class="ff50" type="text" name="sallery" value="{{$staff->sallery}}" placeholder="Sallery" required >

       

             <div class="ff50 gender" style="">

         	<label>Gender</label>
			<input type="radio" value="Male" name="gender" required @if($staff->gender == 'Male') checked @endif><span>Male</span>
			<input type="radio" value="Female" name="gender" @if($staff->gender == 'Female') checked @endif><span>Female</span>
        
            
    
             <button class="ff50" type="submit" name="submit" href="/">Submit</button>

          </div>

      

    

      </form>

      </div>  

       <script src="js/mf-conditional-fields.min.js"></script>

        <script type="text/x-rules" id="rules-mf-conditional-fields">

    [

    {

       "field":"dependant_field",

       "container":".form-group",

       "action":"show",

       "logic":"or",

       "rules":{

          "name":"parent_field",

          "operator":"is",

          "value":"yes"

       }

    },

    {

       "field":"dependant_container",

       "container":".alert-primary",

       "action":"hide",

       "logic":"or",

       "rules":{

          "name":"parent_field",

          "operator":"is",

          "value":"yes"

       }

    }

    

    

 ]

  </script>

  <script>

    // Example 1

    mfConditionalFields('#example_form1', { rules: 'block' });

   

   

  </script>

 

</div>
   
    </div>
   </body>
</html>

@endsection