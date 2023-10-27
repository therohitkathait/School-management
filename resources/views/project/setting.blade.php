@extends('layouts.main')
@section('main-section')
<div class="contenier">


   


<h2 class="addst">School Settings</h2>



   <div class="tab">

  <a href="{{url('/')}}/setting" style="text-decoration: none;"><button class="tablinks active" onclick="openCity(event, 'London')" >Add Class & Fees</button></a>

  <a href="{{url('/transport_fees')}}" style="text-decoration: none;"><button class="tablinks" onclick="openCity(event, 'Paris')" >Transport Fees</button></a>

  <a href="{{url('/subject')}}" style="text-decoration: none;"><button class="tablinks" onclick="openCity(event, 'Tokyo')" >Add Subject</button></a>

  <a href="{{url('/school_profile')}}" style="text-decoration: none;"><button class="tablinks" onclick="openCity(event, 'profile')" >School Profile</button></a>

</div>



@yield('setting-section')




<script>

function openCity(evt, cityName) {

  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }

  document.getElementById(cityName).style.display = "block";

  evt.currentTarget.className += " active";

}



// Get the element with id="defaultOpen" and click on it

document.getElementById("defaultOpen").click();

</script>



</div>
   
    </div>
   </body>
</html>

@endsection