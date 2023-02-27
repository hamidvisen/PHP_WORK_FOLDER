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
   
    if($num==true && $emailNo==true && $name==true){
	$query = mysqli_query($con, $q); 
    ?>
    <script>alert("Fill submitted");</script>
    <?php
}
else{
    ?>
    <script>alert("Please fill form correctly");</script>
    <?php
}
}

?>