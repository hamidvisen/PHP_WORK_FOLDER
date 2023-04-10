
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>import Excel to MYSQl</title>
</head>
<body>
    <form class="" action="" enctype="multipart/form-data" method="post">
<input type="file" name="excel" require value=""><br><br>
<button type="submit" name="import">upload</button><br><br>
<button name='insert'><a href="insert.php">insert</a> </button>
    </form>
    <table border=3>
        <tr>
            <td><b>id<b></td>
            
            <td><b>RollNumber<b></td>
            <td><b>Name<b></td>
            <td><b>Branch<b></td>
            <td><b>Semester<b></td>
            <td><b>City<b></td>
            <td><b>Picture<b></td>
			<td>Operations</td>
		</tr>
<?php

$conn = mysqli_connect("localhost:3307","root","", "project_1");
$sql=mysqli_query($conn,"SELECT * FROM tb_data");
if($sql){
	while($row=mysqli_fetch_assoc($sql)){
		$id=$row['id'];
		$roll=$row['RollNumber'];
		$name=$row['Name'];
		$branch=$row['Branch'];
		$sem=$row['Semester'];
		$city=$row['City'];
		$pic=$row['Picture'];
		echo'
		<tr>
            <td><b>'.$id.'<b></td>
            
            <td><b>'.$roll.'<b></td>
            <td><b>'.$name.'<b></td>
            <td><b>'.$branch.'<b></td>
            <td><b>'.$sem.'<b></td>
            <td><b>'.$city.'<b></td>
            <td><b><img src="'.$pic.'" height="100px"/><b></td>
			<td><b><button type="submit" name="upload"><a href="upload_img.php?uploadid='.$id.'">upload img<b></a> 
			<b><button type="delete" name="delete"><a href="delete.php?deleteid='.$id.'"> delete<b></a></td>
            
			
			</tr>
			';
		}
}

?>


  


</table>

<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$RollNumber= $row[0];
				$Name = $row[1];
				$Branch = $row[2];
                $Semester = $row[3];
                $City = $row[4];
				// $Picture="";


				mysqli_query($conn, "INSERT INTO tb_data VALUES('', '$RollNumber', '$Name', '$Branch' ,'$Semester' ,'$City')");
			}

			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
		}
		?>
	</body>
</html>