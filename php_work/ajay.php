<!-- <?php

$firstnameErr = $lastnameErr  = $phoneErr = $emailErr  = NULL;
$firstname = $lastname  = $phone = $email  = NULL;

$flag = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if (empty($_POST["firstname"])) {
$firstnameErr = "First name is required";
$flag = false;
} else {
$firstname = test_input($_POST["firstname"]);
}

if (empty($_POST["lastname"])) {
$lastnameErr = "Last name is required";
$flag = false;
} else {
$lastname = test_input($_POST["lastname"]);
}

if (empty($_POST["phone"])) {
$phoneErr = "Phone is required";
$flag = false;
} else {
$phone = test_input($_POST["phone"]);
}

if (empty($_POST["email"])) {
$emailErr = "Email is required";
$flag = false;
} else {
$email = test_input($_POST["email"]);
}

$country = $_POST["country"];
$state = $_POST["state"];

// submit form if validated successfully
if ($flag) {

$conn = new mysqli('localhost', "raghav", "Raghu@123", "college");

if ($conn->connect_error) {
die("connection failed error: " . $conn->connect_error);
}

$sql = "INSERT INTO student (firstname,lastname,phone, email, country, state) VALUES('$firstname', '$lastname', '$phone', '$email', '$country', '$state ') ";



// execute sql insert
if ($conn->query($sql) === TRUE) {
echo "<script> alert('data saved successfully');</script>";
}
}
}

function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

?> -->
<?= $firstnameErr; ?>
<?= $phoneErr; ?>
<?= $emailErr; ?>
<!-- <div class="card-text mb-2">
 Country <small>(optional)</small> : <input type="text" name="country" class="form-control" placeholder="Please enter your Country" value="">
 </div>
 <div class="card-text mb-2" style="background-size: 20px;">
 <label>State <small>(optional)</small>:</label> <select class="form-select" name="state" data-bs-toggle="dropdown">
 <option value=""> --select state-- </option>
 <option <?= $state == 'Delhi' ? 'selected' : '' ?> value="Delhi" >Delhi</option>
 <option <?= $state == 'Haryana' ? 'selected' : '' ?> value="Haryana" >Haryana</option>
 <option <?= $state == 'Punjab' ? 'selected' : '' ?> value="Punjab" >Punjab</option>
 <option <?= $state == 'Himachal Pradesh' ? 'selected' : '' ?> value="Himachal Pradesh" >Himachal Pradesh</option>
 </select>
 </div> -->
 value="<?= $email; ?>"
 value="<?= $phone; ?>"
 value="<?= $firstname; ?>"