<?php
include('top_header.php');
include('sidebar_upper.php');
require('connection.php');
?>

<div class="card container mt-4 mb-4 p-2 shadow">
        <h4 class="card-title" style="text-align: center;">Distribution</h4>
        <table class="table table-bordered" style="text-align: center;">
            <tr>
                <th>Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Alloted Date</th>
                <th>Operation</th>
            </tr>
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM request_item where r_received_status='NO'");
            
                while ($row=mysqli_fetch_array($sql)) {

                    if($row[5]==0)
                    {
                        echo "<tr>
                              <td>$row[0]</td>
                              <td>$row[1]</td>
                              <td>$row[2]</td>
                              <td>$row[3]</td>
                              <td>$row[4]</td>
                              <td style='color:blue'>allotted</td>
                              <td><a href='status.php?id=$row[0]' class='btn btn-success'>Deliver</a></td>
                        </tr>";
                    }
                    else 
                    {
                        echo "<tr>
                              <td>$row[0]</td>
                              <td>$row[1]</td>
                              <td>$row[2]</td>
                              <td>$row[3]</td>
                              <td>$row[4]</td>
                              <td style='color:red'>deliverd</td>
                              <td><a href='' class='btn btn-success'>Deliver</a></td>
                        </tr>";
                    }

                }
            
            ?>

            </table>
    </div>
    
    <script type="text/javascript">
        function allotment_update(value){
            alert(value);
        }
    </script>
<?php include("sidebar_lower.php"); ?>