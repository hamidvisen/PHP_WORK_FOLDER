<!DOCTYPE html>
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" href="style.css">
	</head>
<body>
	<div class="center">
		<div class="frm">
			<form  method="POST">
				<label class="label field">Username:</label>
				<input class="username field" type="text" name="user" placeholder="username"><br>
				<label class="label field">Password:</label>
				<input class="Password field" type="Password" name="password" placeholder="Password"><br>
					<div class="buttons center ">
						<button class="login button" type="login" name="login">login</button><br><br>
						<button class="signup button" type="signup" name="done">signup</button>
						<br>
                    </div>
			</form>
		</div>
	</div>
</body>
</html>
<?php 
    
$con=mysqli_connect('localhost:3307','root','','project_1');
// mysqli_select_db($con,'mydb');
// login button
if(isset($_POST['login'])){
	$username=$_POST['user'];
	$password=$_POST['password'];
	$sql= "SELECT * FROM login_details WHERE username = '$username' AND password_ = '$password' ";
	$result = mysqli_query($con,$sql);
	$check = mysqli_fetch_array($result);
    
    if (mysqli_num_rows($result) == 1) {
        // User is logged in, redirect to a secure page
        header("Location: table.php");
        exit;
      } else {
        // Display an error message
        echo "Invalid username or password.";
      }

	}
// signup button
if(isset($_POST['done'])){
$username=$_POST['user'];
$password=$_POST['password'];
$insert = "INSERT INTO data (user, pass,otp)
VALUES ('$username', '$password',0)";
if (mysqli_query($con, $insert)) {
  echo"<script>alert('New record created successfully')</script>";
} 
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
?>




	





