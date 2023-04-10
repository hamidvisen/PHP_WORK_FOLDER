<?php 
$conn=mysqli_connect("localhost:3307","root","","inventory_db");
if($conn){
    // echo "connected";
}
else{
    echo("failed");
}
?>