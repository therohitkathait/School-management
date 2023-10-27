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

                <div class="studentform">

                <form action="{{url('/add_staff')}}" method="post" enctype="multipart/form-data">
                 	@csrf

        <div class="title">

          <i class="fas fa-pencil-alt"></i> 

          <h2>Staff Registration</h2>

        </div>

        <div class="info">

            <div class="imgupload">

            <img id="output" value="upload image"/>

            <input type="file" name="image" accept="image/*" onchange="loadFile(event)">

                   <p style="color:red;"></p>

</div>

          <input class="fname ff50" type="text" name="name" placeholder="Full name">

          <input class="ff50" type="text" name="father_name" placeholder="Father Name">

    

           <input class="ff50" type="date" name="dob" placeholder="Date of birth">

          <input class="ff50" type="Number" name="number" placeholder="Mobile Number">

          

     

          

        

         

             <input class="ff50" type="text" name="address" placeholder="Adress">
             
             <select class="ff50" type="text" name="designation" placeholder="Designation">
                 <option>Designation</option>
                 <option value="teacher">Teacher</option>
                 <option value="Driver">Driver</option>
                 <option value="Office Employee">Office Employe</option>
                 <option value="Peone">Principal</option>
                 <option value="Peone">Peone</option>
             </select>

             <!--<input class="ff50" type="text" name="subject" placeholder="Subject">--->

             <input class="ff50" type="Number" name="sallery" placeholder="Sallery">
             

             <div class="ff50">

         <lable>Gender</lable>

             <input type="radio" value="Male" name="gender"><span>Male</span>

             <input type="radio" value="Female" name="gender"><span>Female</span></div>

             <button class="ff50" type="submit" name="submit" href="/">Submit</button>

          </div>

       

    

      </form>

      </div>  

       

</div>
   
    </div>
   </body>
</html>

@endsection