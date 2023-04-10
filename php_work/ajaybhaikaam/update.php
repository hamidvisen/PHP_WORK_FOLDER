<?php
include 'config.php';
$id=$_GET['updateid'];
if(isset($_POST['SUBMIT'])){
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $branch=$_POST['branch'];
    $sem=$_POST['sem'];
    $city=$_POST['city'];
    $image=$_FILES['image'];

    $sql="update  `student` set id=$id,name='$name',roll='$roll',branch='$branch',sem='$sem',city='$city',image='$image' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:index.php');
    }else{
        die(mysqli_error($conn));
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="main.css">
</head>
<body>
<form  method="post">
<div class="txt">
      <H1>Student Update</H1>
   </div>

  <div class="container">
    <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="psw"><b>Roll No.</b></label>
    <input type="text" placeholder="Enter Roll no." name="roll" required>

    <label for="psw"><b>Branch</b></label>
    <input type="text" placeholder="Enter Branch" name="branch" required>

    <label for="psw"><b>Sem</b></label>
    <input type="text" placeholder="Enter Sem" name="sem" required>

    <label for="psw"><b>City</b></label>
    <input type="text" placeholder="Enter city" name="city" required>

    <label for="psw"><b>Image</b></label>
    <input  type="file" name="image" required>


    <button type="submit" name="SUBMIT" >Update</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
  </div>
</form>
</body>
</html>
