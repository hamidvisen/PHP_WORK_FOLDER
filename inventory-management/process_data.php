<?php
$conn = mysqli_connect("localhost","root","", "inventory_db");
    //... mysql connection etc.

    $response = Array();

   // $response['status'] = false;

    $query = mysqli_query($conn,"SELECT p_name FROM product_list WHERE p_name LIKE '%".$_POST['value']."%' LIMIT 10"); //Or you can use = instead of LIKE if you need a more strickt search
  

    if(mysqli_num_rows($query)) {
        $userData = mysqli_fetch_assoc($query);

        $response[] = $userData;
      //  $response['status'] = true;            
    }

    echo json_encode($response);