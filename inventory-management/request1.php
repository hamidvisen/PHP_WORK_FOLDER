<?php
include('top_header.php');
include('sidebar_upper.php');
require('connection.php');
?>


<style>
  .dropdown {
    display: inline-block;
    position: relative;

  }

  .dropdown-content {
    display: none;
    position: absolute;
    width: 100%;
    overflow: auto;
    box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.4);
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown-content a {
    display: block;
    color: #000000;
    padding: 5px;
    text-decoration: none;
  }

  .dropdown-content a:hover {
    color: #FFFFFF;
    background-color: #00A4BD;
  }
</style>



<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      var x = 1;

      //alert(formatDate());
      var datetoday = formatDate();
      var html = '<tr><td><div class="dropdown"><input class="form-control name" data-tt="x" type="text" name="txtName[]" required=""><span class="dropdown-content result"></span></div></td><td><input class="form-control" type="text" name="txtQty[]" required=""></td><td><input class="form-control" type="date" value="' + datetoday + '" name="txtDate[]" required="" readonly></td><td><input class="form-control" type="text" name="txtReason[]" required=""></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="remove"></td></tr>';
      var max = 5;


      $('#add').click(function () {
        if (x <= max) {
          $('#table_field').append(html);
          x++;
        }
        // var datetoday=formatDate();
        //document.getElementById('date').text() = datetoday;


      });
      $('#table_field').on('click', '#remove', function () {
        $(this).closest('tr').remove();
        x--;

      });
    });

    $('.name').keyup(function () {
      //   alert("hello");
      var rs = $(this).data('tt');
      //alert(rs);
      var ProdName = $(this).val();
      if (ProdName != "") {
        $.ajax({
          url: 'process_data.php',
          type: 'POST',
          dataType: 'json',
          data: { value: ProdName },
          success: function (data) {
            // alert(data[0].p_name);
            var res = (data[0].p_name);
            //alert(res);
            $(".result").html(data[0].p_name);
            $('.result').css("display", "block");
          }
        });
      }
      else {
        $('.result').css("display", "none");
      }
    });

    $('.result').click(function () {
      var span_Text = $(this).text();
      $('.name').val(span_Text);
      $('.result').css("display", "none");
      //alert(span_Text);
    });
  </script>
</head>
<div id="page-wrapper">
  <div class="main-page">

    <form class="insert-form" id="insert_form" method="post" action="">
      <hr>
      <h3 class="text-center">Request Item</h3>
      <hr>
      <div class="input-field">
        <table class="table table-bordered" id="table_field">
          <tr>
            <th>Product Name</th>
            <th>Product Qty</th>
            <th>Date</th>
            <th>Reason</th>
            <th>Add Or Remove</th>
          </tr>
          <?php
          $conn = mysqli_connect("localhost", "root", "", "inventory_db");
          $email = 'ajay@gmail.com';

          $q1 = "SELECT m_id FROM member_list WHERE m_email='$email'";
          $r1 = mysqli_query($conn, $q1);

          while ($rows = $r1->fetch_assoc()) {
            $m_id = $rows['m_id'];
          }
          $current_date = date("Y-m-d H:i:s");
          // echo $current_date;
          

          //echo $m_id;  
          
          if (isset($_POST['save'])) {

            $prodtype = 'Consumable';
            $txtName = $_POST['txtName'];
            $txtReason = $_POST['txtReason'];
            $txtQty = $_POST['txtQty'];
            $txtDate = $_POST['txtDate'];

            //$txtId=array();
          
            // foreach($txtName as $key => $value){
            //  echo $value."\n";
            //     $save="SELECT p_id FROM product_list WHERE p_name='$value'";
          
            //   $query2=mysqli_query($conn,$save);
            //    while($row = $query2->fetch_assoc()){
            //    $txtId=$row['p_id'];
            //     }
          
            //  }
          
            // echo $txtId;
          
            //query for inserting in request table
            $request1 = "INSERT INTO request_tbl(request_id, request_date, request_user, request_status, deliever_status,received_status, `status`) VALUES ('','$current_date','$m_id','request','request','request','1')";
            $q1 = mysqli_query($conn, $request1);
            if ($q1) {
              // echo "Successfully Requested";
            }

            $q2 = "SELECT MAX(request_id) FROM request_tbl";
            $q1 = mysqli_query($conn, $q2);

            while ($rows = $q1->fetch_assoc()) {
              $t_id = $rows['MAX(request_id)'];
            }


            // query for inserting in request items 
            foreach ($txtName as $key => $value) {

              $save = "SELECT p_id FROM product_list WHERE p_name='$value'";

              $query2 = mysqli_query($conn, $save);
              while ($row = $query2->fetch_assoc()) {
                $txtId = $row['p_id'];
              }

              $request2 = "INSERT INTO `request_item`(`rp_id`, `r_id`, `r_qty`, `reason`,
                     `r_fd`, `r_td`, `r_days`, `r_accept_status`, `r_accept_by`, `r_accept_on`, 
                     `r_received_status`, `r_received_by`, `r_received_on`, `r_return_status`, 
                     `r_return_by`, `r_return_on`) VALUES ('$txtId','$t_id','" . $txtQty[$key] . "',
                     '" . $txtReason[$key] . "','" . $txtDate[$key] . "','','','NO',
                     '','','NO','','','NO','','')";

              $q2 = mysqli_query($conn, $request2);
              if ($q2) {
                // echo "Successfully Requested";
              }
            }

          }

          ?>

          <tr>

            <td>
              <div class="dropdown"><input class="form-control name" type="text" name="txtName[]" data-tt="0"
                  required="">

                <span class="dropdown-content result"></span>
                <div>
            </td>
            <td><input class="form-control" type="number" name="txtQty[]" required=""></td>
            <td><input class="form-control" type="date" id="date" name="txtDate[]" required="" readonly></td>
            <td><input class="form-control" type="text" name="txtReason[]" required=""></td>
            <td><input class="btn btn-warning" type="button" name="adda" id="add" value="Add"></td>
          </tr>
        </table>
        <center>
          <input class="btn btn-success" type="submit" name="save" id="save" value="Request">
        </center>
      </div>

    </form>



  </div>
</div>


<script>
  const dateInput = document.getElementById('date');


  dateInput.value = formatDate();
  const date = formatDate();

  console.log(formatDate());

  function padTo2Digits(num) {
    return num.toString().padStart(2, '0');
  }

  function formatDate(date = new Date()) {
    return [
      date.getFullYear(),
      padTo2Digits(date.getMonth() + 1),
      padTo2Digits(date.getDate()),
    ].join('-');
  }
</script>

<script language="javascript">
  $('.name').keyup(function () {
    //   alert("hello");
    var rs = $(this).data('tt');
    //alert(rs);
    var ProdName = $(this).val();
    if (ProdName != "") {
      $.ajax({
        url: 'process_data.php',
        type: 'POST',
        dataType: 'json',
        data: { value: ProdName },
        success: function (data) {
          // alert(data[0].p_name);
          var res = (data[0].p_name);
          //alert(res);
          $(".result").html(data[0].p_name);
          $('.result').css("display", "block");
        }
      });
    }
    else {
      $('.result').css("display", "none");
    }
  });

</script>

<script language="javascript">
  $('.result').click(function () {
    var span_Text = $(this).text();
    $('.name').val(span_Text);
    $('.result').css("display", "none");
    //alert(span_Text);
  });
</script>

<?php
include("sidebar_lower.php");
?>