<!-- <!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
</head>
<body>
  <h1>Login Form</h1>
  <form method="post" >
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br>
    <br>
    <input type="submit" value="Login">
  </form>
</body>
</html> -->


<?php
// Connect to the database


$conn = mysqli_connect('localhost', 'root', '','project_1');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $username = $_POST["user"];
  $password = $_POST["password"];

  // Check if the username and password are valid
  $sql = "SELECT * FROM login_details WHERE username = '$username' AND password_ = '$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    // User is logged in, redirect to a secure page
    // header("Location: secure.php");
    echo "valid username or password.";
    exit;
} else {
    // Display an error message
    echo "Invalid username or password.";
  }
}
?>
