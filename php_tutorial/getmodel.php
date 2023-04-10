<?php
$brand=$_POST["brandid"];
$model=array("pramodsir", "gopal","roshan");
$data= "";
foreach ($model as  $value) {
	$data.="<li>".$value."</li>";
}
echo  json_encode($data);


  ?>