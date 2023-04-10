<?php
require 'conn.php';
$search = $_POST['query'];
$q = "SELECT packages_name FROM service where packages_name = '$search'";

$data= "";
$query = mysqli_query($con, $q);
while($row = mysqli_fetch_array($query)){
    $data.=$row[0];
    
}
echo  json_encode($data);
