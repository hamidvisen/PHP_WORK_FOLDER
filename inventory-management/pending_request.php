<?php include("top_header.php");
 include("sidebar_upper.php");
require("connection.php"); ?>

<div class="container card mt-2" style="box-shadow:0 0 5px #a8a8a8;">
    <table class="table table-bordered table-hover">
        <h3 class="text-center">Pending Requests</h3>

        <input type="search" placeholder="Search">
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Request Date</th>
            <th class="text-center">Operations</th>
        </tr>
        <!-- fetching data of user -->
        <?php
        $sql="SELECT * FROM `request_tbl` INNER JOIN member_list on request_tbl.request_user=member_list.m_id INNER JOIN request_item on request_tbl.request_id=request_item.r_id where r_accept_status='NO'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            // Access the data using the column names or indexes
            $request_id = $row['m_name'];
            $request_date = $row['request_date'];
            $id=$row['m_id'];
            echo '
                    <tr>
                    <td class="text-center">' . $request_id . '</td>
                    <td class="text-center">' . $request_date . '</td>
                    <td class="text-center"><button type="View" class="btn btn-primary"><a href="view_request.php?m_id='.$id.'" style="text-decoration: none;color:white;">View</a></button></td>
                    </tr>
                ';
        }
        ?>
    </table>
</div>
<?php include("sidebar_lower.php");?>