<?php
$x=$_REQUEST['roll'];
$y=$_REQUEST['name'];
$z=$_FILES['img']['name'];
$t=$_FILES['img']['tmp_name'];
$c=mysqli_connect('localhost','root','','abcd');
$q="insert into photo values('$x','$y','$z')";

        
if(move_uploaded_file($t,$z))
{
    echo"uploaded";
    $rs=mysqli_query($c,$q);
    echo"<a href='imgdatabase3.php' ><input type='button' value='show database' name='show'></a>";
}
else{
    echo"not uploaded";
}




?>