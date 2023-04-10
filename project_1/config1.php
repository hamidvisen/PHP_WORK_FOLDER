<?php
$con = mysqli_connect('localhost:3307', 'root');
mysqli_select_db($con, 'hamiddb');

if($con){
	echo "connected";

}
else{
	echo "Not Connected"; 
}

?>