<!DOCTYPE html>
<html lang="en">
<body>
    <form action="" method="post">
    <input type="file" name="image">
    <button type='submit' name='submit'>submit</button>
</form>
</body>

</html>
<?php
    $i=$_GET['uploadid'];
if(isset($_POST['submit'])){
// $username=$_POST['user'];
$z=$_POST['image'];

// $t=$_FILES['image']['tmp_name'];


$q= "UPDATE tb_data
SET Picture = '$z'
WHERE id = $i";
$con = mysqli_connect('localhost:3307','root');
mysqli_select_db($con,'project_1');
$query=mysqli_query($con,$q);

}
?>