
<?php
require("connection.php");
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    
    $sql="DELETE FROM request_item where `request_serial`=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // header('location:view_requests.php');
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        die(mysqli_error($conn));
    }
}

?>