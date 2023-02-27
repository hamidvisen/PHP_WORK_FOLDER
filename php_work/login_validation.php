<?php
$GLOBALS['flag'] = true;
echo $flag;
?>
 <?php
include 'conn.php';

if(isset($_POST['done'])){

	$firstname = $_POST['firstname'];
	$phonenum = $_POST['phone'];
    $em = $_POST['email'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    
    
    $q = "INSERT INTO `registration`(`name`, `contact`, `email`, `country`, `state`, `city`) VALUES ('$firstname','$phonenum','$em','$country', '$state','$city')";
   
//     if($num==true && $emailNo==true && $name==true){
// 	$query = mysqli_query($con, $q); 
//     ?>
<!-- //     <script>alert("Fill submitted");</script> -->
//     <?php
// }
// else{
//     ?>
<!-- //     <script>alert("Please fill form correctly");</script> -->
//     <?php
// }
}

?>
<script>
function validateName() {
  let x = document.getElementById("firstname").value;
 
  if (x=="") {
    document.getElementById("err").innerHTML = "Name must be filled out";
  
    <?php
$GLOBALS['flag'] = false;
echo $flag;
?>

  }
  if ( x.length>2) {
    document.getElementById("err").innerHTML = "";
    <?php
$GLOBALS['flag'] = true;
echo $flag;
?>
  }
}
function validate() {
  let x = document.getElementById("firstname").value;
 
  if ( x.length<2) {
    document.getElementById("err").innerHTML = "Name must be of 3 letter";
    <?php
$GLOBALS['flag'] = false;
echo $flag;
?>
  }
  

}

function phoneNumber()
{
  var phoneno = /^[+]*[(]{0,1}[5-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
 
  if(document.getElementById("phone").value.match(phoneno))
  {
    document.getElementById("err2").innerHTML = "";
    
  }
  else
  {
    document.getElementById("err2").innerHTML = "Invalid Number";
    
  }
  }

function validnum() {
  let x = document.getElementById("phone").value;
 ;
  if (x=="") {
    document.getElementById("err2").innerHTML = "Number must be of 10 digit";
    
  }
}

  function emailnum() {
    var emailNo = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if(document.getElementById("email").value.match(emailNo)){
   
  }
  else{
    document.getElementById("err3").innerHTML = "Enter valid email";
  
  }
  }
  </script>
 
 

<!DOCTYPE html>
 <html>

 <head>
 <meta charset="utf-8">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" >
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin ="anonymous"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  
  <script src="//geodata.solutions/includes/countrystatecity.js"></script>
 <title>Registration</title>
 <style type="text/css">
 .error {
 font-size: 15px;
 color: red;
 }
 </style>
 </head>

 <body>
   

 <form method="post">
 <?php
    include 'validation.php'; ?>
   
 
 <div class="card pt-2 mx-auto" style="max-width: 30rem;">
 <div class="card-header" style="font-size: 25px;
 font-style: italic;">
 <header>Registration Form</header>
 </div>
 <div class="card-body">
 <div class="card-text mb-2">
 Name* : <input type="text" id="firstname" name="firstname" onfocus="validate()" onchange="validateName()" class="form-control" placeholder="Enter your name" >
 <span id="err" class="error"> </span>
 </div>
 
 <div class="card-text mb-2">
 Phone* : <input type="tel" maxlength="10" id="phone" name="phone" onfocus="validnum()" onchange="phoneNumber()" class="form-control" placeholder="Please enter your phone">
 <span id="err2" class="error"> </span>
 </div>
 <div class="card-text mb-2">
 Email-id* : <input type="text" id="email" name="email" onchange="emailnum()" class="form-control" placeholder="Please enter your Email id" >
 <span id="err3" class="error"> </span>
 </div>
 
 </div>
 <div class="container">
  <div class="row">
    <div class="col-sm-4">
      <p>Country</p>
      <select name="country" class="countries form-control" id="countryId">
    <option value="">Select Country</option>
</select>

    </div>
    <div class="col-sm-4">
      <p>State</p>
      <select name="state" class="states form-control" id="stateId">
    <option value="">Select State</option>
</select>
    </div>
    <div class="col-sm-4">
      <p>City</p>        
      <select name="city" class="cities form-control" id="cityId">
    <option value="">Select City</option>
</select>
    </div>
  </div>
</div>
 <div style="padding-top:20px;padding-left:20px;font-size:46px; padding-right:20px;" class="card-footer mb-2 btn-lg">
 
 <button class="button btn btn-primary" type="submit" name="done">Login</button>
 </div>
 </div>
 </form>

 </body>

 </html>