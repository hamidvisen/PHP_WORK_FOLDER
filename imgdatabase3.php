<?php
$c=mysqli_connect('localhost','root','','abcd');
$q="select * from photo";
$rs=mysqli_query($c,$q);
    
echo"<table border=1>";
while($row=mysqli_fetch_array($rs))
{
    echo"<tr><td>$row[roll]</td><td>$row[name]</td><td><img src='$row[img]' height='100px' width='100px'></td></tr>";
}
?>