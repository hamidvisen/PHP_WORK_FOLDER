<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styles.css">

</html>
<?php
include 'conn.php';

if(isset($_POST['done'])){

	$uname = $_POST['uname'];
	$pswd = $_POST['psw'];

	$q = "SELECT `username`, `password` FROM `login_table`";

	$query = mysqli_query($con, $q); 
	while($row = mysqli_fetch_array($query)){
	  if($uname==$row['username']) {
            
	  	if($pswd==$row['password']){
         
         
         header("location: https://www.google.com/");
      }
      else{
      	echo "Password is incorrect";
      }
  }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  }
?>
