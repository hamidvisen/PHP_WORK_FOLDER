<?php
session_start();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="cart.css" />
  <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.css" />
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
</head>

<body>


  <!-- manufacture content -->



  <form method="post">


    <div class="ca1 card mb-3">
      <div class="card-header border-0 bg-white">
        <h3> <span class="text-danger">▼</span></h3> <span class="badge text-bg-primary text-center pt-3">🕑20 min</span>
      </div>
      <div class="body">
        <div class="body1">
          <table id="mytable" class="table table-bordered border-primary table-striped">
            <thead>
              <tr>
                <th scope="col">sr.</th>
                <th scope="col">Item</th>
                <th scope="col">Package</th>
                <th scope="col">Description</th>
                <th scope="col">Rate</th>
                <th scope="col"> Total</th>
                <th scope="col"> Dis</th>
                <th scope="col"> Total</th>
                <th scope="col"> 18%</th>
                <th scope="col"> G/T</th>
                <th scope="col"> ✂</th>

              </tr>
            </thead>
            <tbody>
            <?php
            require 'conn.php';
            $quantity = 0;
            $i = 1;
            $j = 1;
            $k = 0;
            $sum = 0;
            $gst_sum = 0;
            $gt_sum = 0;
            $addons = $_SESSION["arr"];
           
           


            foreach ($addons as $values) {

              $q = "SELECT `item_rate` FROM `rate` WHERE item_element = '" . $values . "'";

              $query = mysqli_query($con, $q);
              $row = mysqli_fetch_array($query);
              $gst = (18 * $row[0]) / 100;
              $gst_sum += $gst;
              $gt = $row[0] + $gst;
              $gt_sum += $gt;
              $sum += $row[0];
              ++$quantity;
              echo ('
    <tr id="row'.$j.'">
   
      <th scope="row">' . $i++ . '</th>
      <td>' . $_SESSION["modelname"] . '</td>
      <td> ' . $values . '</td>
      <td> ADD-ONs </td>
      <td>' . $row[0] . '</td>
      <td>1</td>
      <td>dis</td>

      <td>' . $row[0] . '.00</td>
      <td>' . $gst . '</td>
      <td>' . $gt . '</td>
      <td><button type="sumbit" id="' . $i . '" onclick="delRow(this.id);" class="ms-1 border-0 bg-danger" name="submit">X</button></td>
      
    </tr>');
              
              $j += 1;
              $k += 1;
            }
            foreach ($addons as $values) {

              $q = "SELECT `packages_rate` FROM `service` WHERE `packages_name`=
              ";

              $query = mysqli_query($con, $q);
              $row = mysqli_fetch_array($query);
              $gst = (18 * $row[0]) / 100;
              $gst_sum += $gst;
              $gt = $row[0] + $gst;
              $gt_sum += $gt;
              $sum += $row[0];
              ++$quantity;
              echo ('
    <tr id="row'.$j.'">
   
      <th scope="row">' . $i++ . '</th>
      <td>' . $_SESSION["modelname"] . '</td>
      <td> ' . $values . '</td>
      <td> ADD-ONs </td>
      <td>' . $row[0] . '</td>
      <td>1</td>
      <td>dis</td>

      <td>' . $row[0] . '.00</td>
      <td>' . $gst . '</td>
      <td>' . $gt . '</td>
      <td><button type="sumbit" id="' . $i . '" onclick="delRow(this.id);" class="ms-1 border-0 bg-danger" name="submit">X</button></td>
      
    </tr>');
              
              $j += 1;
              $k += 1;
            }
            ?>
            <tr id="total">

              <th colspan="5">TOTAL</th>

              <td><b><?php echo ($quantity); ?></b></td>
              <td></td>

              <td> <b><?php echo ($sum.".00"); ?></b></td>
              <td><b><?php echo ($gst_sum); ?></b></td>
              <td><b><?php echo ($gt_sum); ?></b></td>
              <td>✂</td>


            </tr>
            </tbody>
            <script>
// window.alert(document.getElementById("mytable").lastChild=="TR");
               
              function delRow(button) {
                window.event.preventDefault();
                var index = "row"+(button-1);
              
               
                if ((button - 1) != 0) {
                  
                   
                  var quant = parseFloat(document.getElementById("total").childNodes[3].firstChild.innerHTML);
 var sum =  parseFloat( document.getElementById("total").childNodes[7].lastChild.innerHTML);
 var tax =  parseFloat(document.getElementById("total").childNodes[9].firstChild.innerHTML);
 var gt = parseFloat(document.getElementById("total").childNodes[11].firstChild.innerHTML);
                 
                  var q = parseInt(document.getElementById(index).childNodes[11].innerHTML);
                  var row_sum = parseFloat(document.getElementById(index).childNodes[15].innerHTML);
                  var row_tax =parseFloat( document.getElementById(index).childNodes[17].innerHTML);
                  var row_gt= parseFloat(document.getElementById(index).childNodes[19].innerHTML);

                  var new_quant = quant-q;
                  var new_sum = sum-row_sum;
                  var new_tax = tax-row_tax;
                  var new_gt = gt-row_gt;
                  document.getElementById("total").childNodes[3].firstChild.innerHTML = new_quant;
                  document.getElementById("total").childNodes[7].lastChild.innerHTML = new_sum.toFixed(2);;
                  document.getElementById("total").childNodes[9].firstChild.innerHTML =new_tax.toFixed(2);; 
                  document.getElementById("total").childNodes[11].firstChild.innerHTML = 
                  new_gt.toFixed(2);;
                  document.getElementById("mytable").deleteRow(button-1);
                 }
              }


            </script>



        </div>

      </div>









</body>
<script>
    const obj = JSON.parse( sessionStorage.getItem("add"));
    console.log(obj[0]);
    console.log(obj.length);

var i = 0;
var index = 'package';
    while(i < obj.length){
    index += i;
   
    var table = document.getElementById("mytable");
  var row = table.getElementsByTagName("tr")[i+1].childNodes[5];
  // var td = row.getElementsByTagName("td")[3];
  row.innerHTML = obj[i];
  i++;
} 
      
      

     
     
    
   </script>

</html>