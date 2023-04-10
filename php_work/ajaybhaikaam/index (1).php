<?php require 'config.php'; ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
	<head> 
		<meta charset="utf-8">
		<title>Import Excel To MySQL</title>
        <link rel="stylesheet" href="style.css">
	</head>
    <style>
        img{
            width:100px;
        }
        .box{
            background-color: red;
    width: 780px;
    height: 15px;
    padding: 15px;
    margin-left: 203px;
    border-radius: 3px;
text-align:center;
font-weight:bold;
font-size:20px;
        }
        
    </style>
	<body>
		<form class="" action="" method="post" enctype="multipart/form-data">
			<input  type="file" name="excel" required value="">
			<button class="btn" type="submit" name="import">Import</button>   
		</form>
		<hr>
        <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="filter_value">
        <input  type="text" name="filter_value" placeholder="Search/Filter Record">
        </div>
        <div class="filter_btn">
        <button type="submit" name="filter_btn">Filter Data</button>
        </div>
        </form>
        <div class="box">
          Manage Student Detail
        </div>
		<table id="tbl" border = 1>
            <thead>
			<tr>
				<th scope="col"><h3>Id Number</h3></th>
				<th scope="col"><h3>Name</h3></th>
				<th scope="col"><h3>Roll No.</h3></th>
				<th scope="col"><h3>Branch</h3></th>
                <th scope="col"><h3>Sem</h3></th>
                <th scope="col"><h3>City</h3></th>
                <th scope="col"><h3>Image</h3></th>
                <th scope="col"><h3>Opration</h3></th>
			</tr>
            </thead>
			<?php
            $q ="SELECT * FROM student";
			$rows = mysqli_query($conn, $q);
			foreach($rows as $row) :
			?>
            <?php
            $id=$row['id'];
            $name=$row['name'];
            $roll=$row['roll'];
            $branch=$row['branch'];
            $sem=$row['sem'];
            $city=$row['city'];
            $image=$row['image'];

            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$roll.'</td>
            <td>'.$branch.'</td>
            <td>'.$sem.'</td>
            <td>'.$city.'</td>
            <td><img src='.$image.'/></td>
            <td>
                <button><a href="update.php?updateid='.$id.'">Update</a></button>
                <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
            </tr>';
            ?>
			<!-- <tr>
				<td> <?php echo $id=$row["id"] ?> </td>
				<td> <?php echo $name=$row["name"]; ?> </td>
				<td> <?php echo $roll=$row["roll"]; ?> </td>
                <td> <?php echo $branch=$row["branch"]; ?> </td>
                <td> <?php echo $sem=$row["sem"]; ?> </td>
				<td> <?php echo $city=$row["city"]; ?> </td>
                <td>
                <button><a href="update.php">Update</a></button>
                <button><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
			</tr> -->
			<?php endforeach; ?>
		</table>
        <?php
          if(isset($_POST['filter_btn']))
          {
            $value_filter = $_POST['filter_value'];
            $query = "SELECT * FROM student WHERE CONCAT(name,roll,branch) LIKE '%$value_filter%'";
            $query_run = mysqli_query($conn,$query);

            if(mysqli_num_rows($query_run) > 0)
            {
                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                    <tr>
                    <td> <?php echo $id=$row["id"] ?> </td>
				    <td> <?php echo $name=$row["name"]; ?> </td>
				    <td> <?php echo $roll=$row["roll"]; ?> </td>
                    <td> <?php echo $branch=$row["branch"]; ?> </td>
                    <td> <?php echo $sem=$row["sem"]; ?> </td>
				    <td> <?php echo $city=$row["city"]; ?> </td>
                    <td> <?php echo $image=$row["image"]; ?> </td>
                    </tr>
                    <?php

                }
            }else
            {
                ?>
                <tr>
                    <td colspan="6">NO Record Found</td>
                </tr>
                <?php
            }
          }

        ?>
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
                $q ="INSERT INTO student VALUES('', '$name', '$roll', '$branch', '$sem', '$city')";
				mysqli_query($conn, $q);
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