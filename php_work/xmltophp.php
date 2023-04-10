<?php require 'config1.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input  type="file" name="excel" required value="">
			<button class="btn" type="submit" name="import">Import</button>
		</form>
		<hr>
		<table id="tbl" border = 1>
			<tr>
				<td><h3>S No.</h3></td>
				<td><h3>Name</h3></td>
				<td><h3>Roll No.</h3></td>
				<td><h3>Branch</h3></td>
                <td><h3>Sem</h3></td>
                <td><h3>City</h3></td>
                <td><h3>opration</h3></td>
			</tr>
			<?php
			$i = 1;
			$q = "SELECT * FROM `student`";

	$rows = mysqli_query($con, $q); 

			foreach($rows as $row) :
			?>
			<tr>
				<td> <?php echo $i++; ?> </td>
				<td> <?php echo $row["name"]; ?> </td>
				<td> <?php echo $row["roll"]; ?> </td>
                <td> <?php echo $row["branch"]; ?> </td>
                <td> <?php echo $row["sem"]; ?> </td>
				<td> <?php echo $row["city"]; ?> </td>
			</tr>
			<?php endforeach; ?>
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
				$name = $row[0];
				$roll = $row[1];
                $branch = $row[2];
                $sem = $row[3];
				$city = $row[4];
				
				$q = "INSERT INTO student VALUES('', '$name', '$roll', '$branch', '$sem', '$city')";

	 mysqli_query($con, $q); 
				
				
			}
			
			echo
			"
			<script>
			alert('Succesfully Imported');
			// document.location.href = '';
			</script>
			";
		}
		?>
	</body>
</html>