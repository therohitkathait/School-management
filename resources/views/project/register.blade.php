
<!DOCTYPE html>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body {font-family: Arial, Helvetica, sans-serif;

     background-color: #5cb5b5;

}

 


.imgcontainer h1 {

    font-size: 19px;

}



/* Full-width input fields */

input[type=text], input[type=password] {

  width: 49%;

  padding: 12px 20px;

  margin: 8px 0;

  display: inline-block;

  border: 1px solid #ccc;

  box-sizing: border-box;

}



/* Set a style for all buttons */

button {

  background-color: #5cb5b5;

  color: white;

  padding: 14px 20px;

  margin: 8px 0;

  border: none;

  cursor: pointer;

  width: 100%;

}



button:hover {

  opacity: 0.8;

}







/* Center the image and position the close button */

.imgcontainer {

  text-align: center;

  margin: 24px 0 12px 0;

  position: relative;

}



img.avatar {

  width: 40%;

  border-radius: 50%;

}



.container {

  padding: 16px;

}



span.psw {

  float: right;

  padding-top: 16px;

}



/* The Modal (background) */

.modal {

  /* Hidden by default */

  position: fixed; /* Stay in place */

  z-index: 1; /* Sit on top */

  left: 0;

  top: 0;

  width: 100%; /* Full width */

  height: 100%; /* Full height */

  overflow: auto; /* Enable scroll if needed */

 

  padding-top: 60px;

}



/* Modal Content/Box */

.modal-content {

  background-color: #fefefe;

  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */

  border: 1px solid #888;

  width: 80%; /* Could be more or less, depending on screen size */

}



/* The Close Button (x) */

.close {

  position: absolute;

  right: 25px;

  top: 0;

  color: #000;

  font-size: 35px;

  font-weight: bold;

}



.close:hover,

.close:focus {

  color: red;

  cursor: pointer;

}



/* Add Zoom Animation */

.animate {

  -webkit-animation: animatezoom 0.6s;

  animation: animatezoom 0.6s

}



@-webkit-keyframes animatezoom {

  from {-webkit-transform: scale(0)} 

  to {-webkit-transform: scale(1)}

}

  

@keyframes animatezoom {

  from {transform: scale(0)} 

  to {transform: scale(1)}

}



/* Change styles for span and cancel button on extra small screens */

@media screen and (max-width: 300px) {

  span.psw {

     display: block;

     float: none;

  }

  .cancelbtn {

     width: 100%;

  }

}

</style>

</head>

<body>



<div id="id01" class="modal">

  

  <form class="modal-content animate" action="{{url('/')}}/register" method="post">
    @csrf

    <div class="imgcontainer">

    

    <h1>SCHOOL Registration PORTAL</h1>

    </div>



    <div class="container">

     

      <input type="text" placeholder="School Name" name="schoolname" required>

      <input type="text" placeholder="Enter Username" name="uname" required>

      <input type="password" placeholder="Enter Password" name="password" required>
  
      <input type="text" placeholder="Reg." name="reg" required>

      <input type="text" placeholder="School Dise" name="dise_code" required>

      <input type="text" placeholder="Scode" name="scode" required>

      <input type="text" placeholder="School Adderss" name="school_address" required>

      <input type="text" placeholder="Year" name="year" required>

        

   <button type="submit" name="submit">Register</button>



    </div>



    

  </form>

</div>







</body>

</html>

