<?php
include 'conn.php';

if(isset($_POST['done'])){

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pswd = $_POST['pswd'];


	$q = "INSERT INTO `login_table`(`first_name`, `last_name`, `username`, `password`) VALUES ('$fname','$lname','$uname','$pswd')";

	$query = mysqli_query($con, $q); 
}



?>

<!DOCTYPE HTML>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
	<form method="post">
	<label for="fname">FirstName:</label>
<input type="text" id="fname" name="fname">
<label for="lname">LastName:</label>
<input type="text" id="lname" name="lname">
<label for="username">Userame:</label>
<input type="text" id="username" name="uname">
<label for="password">Password:</label>
<input type="password" id="password" name="pswd">
<input type="submit" name="done">

	</body> 
</html>