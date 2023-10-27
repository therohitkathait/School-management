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

        <div class="studentform">

        <form action="{{url('/add_student')}}" id="example_form1" method="post" enctype="multipart/form-data">
        	@csrf

        <div class="title">

          <i class="fas fa-pencil-alt"></i> 

          <h2>Student Registration</h2>

        </div>

        <div class="info">

            <div class="imgupload">

            <img id="output" value="upload image"/>

            <input type="file" name="image" accept="image/*" onchange="loadFile(event)">

           <p style="color:red;"></p>

</div>

          <input class="fname ff50" type="text" name="name" placeholder="Full name" required >

          <input class="ff50" type="text" name="father_name" placeholder="Father Name" required >

          <input class="ff50" type="text" name="mother_name" placeholder="Mother Name" required >

           <input class="ff50" type="DATE" name="dob" placeholder="(dd/mm/yyyy)Date of birth" required >

          <input class="ff50" type="Number" name="number" placeholder="Mobile Number" required >

          

      <select class="ff50" name="class_name" required >
      		<option value="" selected="">Class*</option>
      		@foreach($fees as $fee)

            
            <option value="{{ $fee->class_name }}">{{ $fee->class_name }}</option>
       

           @endforeach

          </select>

          

           <input class="ff50" type="Number" name="roll_number" placeholder="Roll Number">

            <input class="ff50"  type="Number" name="aadhar_number" placeholder="Aadhar Number" required >

            <input class="ff50" type="Number" name="samagra_id" placeholder="Samagra Number" required >

         

             <input class="ff50" type="text" name="address" placeholder="Adress" required >

       

             <div class="ff50 gender" style="">

         <lable>Gender</lable>

             <input type="radio" value="Male" name="gender" required><span>Male</span>

             <input type="radio" value="Female" name="gender"><span>Female</span></div>


        <div class="ff50 Categury" style="display: inline-block;">
         <select name="category" style="width: 100%;     font-size: 20px;" required >

            <option value="">category*</option>
            <option value="General">General</option>
            <option value="obc">OBC</option>
            <option value="sc">SC</option>
            <option value="st">ST</option>
            </select>

         </div>
        
             <div class="" style="float: left;width: 92%;">

              <div class="form-group">    

        <input type="checkbox" name="transport_service" id="field1" value=1>
         <label for="field1">Add Transport Service</label>

        </div>

          <div class="form-group">

            <select class="" name="pickup_drop_point" id="field2">

                <option>Select Pickup and Drop Point</option>

                @foreach($transportFees as $transportFee)

                <option value="{{ $transportFee->place_name }} (Rs{{ $transportFee->fees }})">{{ $transportFee->place_name }} (Rs{{ $transportFee->fees }})</option>

                @endforeach
            </select>

          </div></div>
             <label class="ff50" style="float: left;"><input type="checkbox" value=1 name="rte"> RTE Addmition </label>
             
            <input type="text" id="year" name="year" placeholder="Enter year">
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