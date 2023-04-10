<?php include("top_header.php"); ?>
<?php require("connection.php"); ?>


<?php

$id = $_POST['id'];
$value = $_POST['value'];
$sql = "UPDATE request_item SET r_qty='$value' WHERE request_serial=$id";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: ".$_SERVER['HTTP_REFERER']);
    // echo $sql;
}else{
    die(mysqli_error($conn)); 
}

?>