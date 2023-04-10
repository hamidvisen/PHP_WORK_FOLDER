<?php include("top_header.php");
require("connection.php");
include("sidebar_upper.php");
?>
<div class="container card mt-2" style="box-shadow:0 0 5px #a8a8a8;">
<table class="table table-bordered table-hover">
    <h3 class="text-center">Requests History</h3>
    <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Allotment Date</th>
        <th class="text-center">Recieving Date</th>
        <th class="text-center">Operations</th>
    </tr>
    <!-- fetching History of user -->
    <?php
        $sql="SELECT * FROM `request_tbl` INNER JOIN member_list on request_tbl.request_user=member_list.m_id INNER JOIN request_item on request_tbl.request_id=request_item.r_id where r_accept_status='YES'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $request_name = $row['m_name'];
            $requested_date = $row['r_accept_on'];
            $request_received_date = $row['r_received_on'];
            $id=$row['m_id'];
            echo'
            <tr>
            <td class="text-center">'.$request_name.'</td>
            <td class="text-center">'.$requested_date.'</td>
            <td class="text-center">'.$request_received_date.'</td>
            <td class="text-center"><button type="View" class="btn btn-primary"><a href="view_request.php?m_id='.$id.'" style="text-decoration: none; color:white;">View</a></button></td>
        </tr>
            ';
        }
        ?>

</table>
</div>
<?php
include("sidebar_lower.php");
?>