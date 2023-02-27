<?php
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'hamiddb');

if($con){
	echo "connected";

}
else{
	echo "Not Connected"; 
}

?>