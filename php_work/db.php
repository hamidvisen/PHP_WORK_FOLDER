<?php
$con=mysqli_connect('localhost','root','','validation');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $mail=$_POST['mail'];
    $dob=$_POST['dob'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    
    $insert = "INSERT INTO validate (naam,contact,mail,dob,country,state_,city)
    VALUES ('$name', '$contact','$mail','$dob','$country','$state','$city')";
    if (mysqli_query($con, $insert)) {
      echo"<script>alert('New record created successfully')</script>";
      header('location:validate.php');
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
  ?>
 