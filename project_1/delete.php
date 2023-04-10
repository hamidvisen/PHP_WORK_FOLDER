<?php
$conn = mysqli_connect("localhost:3307","root","", "project_1");
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `tb_data` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:table.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>