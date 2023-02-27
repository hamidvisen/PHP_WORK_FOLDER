<?php
$con=mysqli_connect('localhost','root','','validation');

$query=mysqli_query($con,"SELECT * FROM validate");
$data = "<table border='1'><thead><tr><th>naam</th><th>contact</th><th>mail</th><th>dob</th><th>country</th><th>state_</th><th>city</th></tr></thead><tbody>";
while($row = mysqli_fetch_assoc($query))
{
    $data.="<tr><td>$row[naam]</td><td>$row[contact]</td><td>$row[mail]</td><td>$row[dob]</td><td>$row[country]</td><td>$row[state_]</td><td>$row[city]</td></tr>";
}
$data.="</tbody></table>";

$name = "DT -".date("d-m-Y");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$name.xls");
echo $data;
 
?>