
<?php
require("connection.php");
$currentDate = date('Y-m-d');
if(isset($_GET['allotid'])){
    $id=$_GET['allotid'];}
    $sql="UPDATE request_item SET `r_accept_status`='YES', `r_accept_on`=DATE('$currentDate') where `request_serial`=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        // header('location:person_request_table.php');
    }else{
        die(mysqli_error($conn));
    }


?>