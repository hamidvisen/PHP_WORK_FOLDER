<?php include("top_header.php");
include("sidebar_upper.php");
require("connection.php");
if (isset($_GET['m_id'])) {
    $id = $_GET['m_id'];
}
$sql = "SELECT * FROM member_list where m_id='$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['m_name'];
    $email = $row['m_email'];
    $designation = $row['m_designation'];
    $clg = $row['m_clg'];
    $department = $row['m_department'];
    $contact = $row['m_contact'];
    $gender = $row['m_gender'];
    $image = $row['m_image'];
}
?>

<div class="container card mt-1" style="box-shadow:0 0 5px #a8a8a8;">
    <div class="row">
        <div class="col-md-2" style="text-align: center;">
            <img src="img/member/<?php echo $image ?>" alt="" class="img_profile"
                style="width: 150px; height: 150px; border: 3px solid whitesmoke; border-radius: 50%;">
        </div>
        <div class="col-md-5">
            <div class="">
                <div class="name m-1 fs-5 ">
                    <label class="fw-bold" for="name">Name :</label>
                    <span id="name">
                        <?php echo $name ?>
                    </span>
                </div>

                <div class="post m-1 fs-5">
                    <label class="fw-bold" for="post">Post :</label>
                    <span id="post">
                        <?php echo $designation ?>
                    </span>
                </div>
                <div class="block m-1 fs-5">
                    <label class="fw-bold" for="block">Block :</label>
                    <span id="block">
                        <?php echo $clg ?>
                    </span>
                </div>
                <div class="Contact m-1 fs-5">
                    <label class="fw-bold" for="Contact">Contact :</label>
                    <span id="Contact">
                        <?php echo $contact ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="Contact m-1 fs-5">
                <label class="fw-bold" for="Contact">Contact :</label>
                <span id="Contact">
                    <?php echo $contact ?>
                </span>
            </div>
            <div class="mail m-1 fs-5">
                <label class="fw-bold" for="mail">Mail Id :</label>
                <span id="mail">
                    <?php echo $email ?>
                </span>
            </div>
            <!-- <div class="address m-1 fs-5">
                <label class="fw-bold" for="address">Address :</label>
                <span id="address"></span>
            </div> -->
            <div class="gender m-1 fs-5">
                <label class="fw-bold" for="gender">Gender :</label>
                <span id="gender">
                    <?php echo $gender ?>
                </span>
            </div>


        </div>
    </div>
</div>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-6">
            <div class="card " style="box-shadow:0 0 5px #a8a8a8;">
                <h3 class="text-center shadow-sm pb-1" style="font-family: 'Montserrat', sans-serif; font-weight:300;">
                    Pending Requests</h3>
                <div class="content" style="overflow: hidden; overflow-y: scroll; height:70vh;">

                    <!-- content of the pending request 
                     starts here -->

                    <table class="table table-bordered table-hover" style="text-align: center;">
                        <tr>
                            <!-- <th>serial</th>
                                <th>id</th>
                                <th>name</th>
                                <th>post</th>
                                <th>block</th> -->
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Request Date</th>
                            <th>Operations</th>
                        </tr>
                        <?php
                        if (isset($_GET['m_id'])) {
                            $id = $_GET['m_id'];
                        }
                        // $sql = "SELECT * FROM member_list where m_id=$id";
                        $sql = "SELECT * FROM `request_tbl` INNER JOIN request_item on request_tbl.request_id=request_item.r_id INNER JOIN product_list on product_list.p_id=request_item.rp_id where r_accept_status='NO' AND request_user=$id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_name = $row['p_name'];
                            $product_quantity = $row['r_qty'];
                            $unit = $row['p_unit'];
                            $request_date = $row['request_date'];
                            $request_serial = $row['request_serial'];
                            echo '
                        <tr>
                            <td>' . $product_name . '</td>
                            <td>' . $product_quantity . '</td>
                            <td>' . $unit . '</td>
                            <td>' . $request_date . '</td>
                            <td>
                            <a class="btn mymodal m-1 btn-primary" data-id="'.$request_serial.'"  href="#">Update</a> 
                            <button class="btn m-1 btn-success" type="allot" name="allot" id="button" "><a style="text-decoration: none; color: white;" href="allot.php?allotid=' . $request_serial . '">Accept</a> </button>
                            <button class="btn m-1 btn-danger" type="delete" name="delete"><a style="text-decoration: none; color: white;" href="delete.php?deleteid=' . $request_serial . '"> Reject</a></button></td>
                            </td>
                        </tr>
                        ';
                        }

                        ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" >Update Quantity</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <form action="update.php" method="post">
                                            <input type="number" id="value" name="value" required style="width: 20%;">
                                            <input type="hidden" id="serno" name="id" >
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="box-shadow:0 0 5px #a8a8a8;">
                <h3 class="text-center shadow-sm pb-1" style="font-family: 'Montserrat', sans-serif; font-weight:300;">
                    Requests History</h3>
                <div class="content" style="overflow: hidden; overflow-y: scroll; height:70vh;">
                    <!-- content of the request history table starts here -->
                    <table class="table table-bordered table-hover" style="text-align: center;">
                        <tr>
                            <!-- <th>serial</th>
                                <th>id</th>
                                <th>name</th>
                                <th>post</th>
                                <th>block</th> -->
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Request Date</th>
                            <th>Recieve Date</th>
                        </tr>
                        <?php
                        if (isset($_GET['m_id'])) {
                            $id = $_GET['m_id'];
                        }
                        // $sql = "SELECT * FROM member_list where m_id=$id";
                        $sql = "SELECT * FROM `request_tbl` INNER JOIN request_item on request_tbl.request_id=request_item.r_id INNER JOIN product_list on product_list.p_id=request_item.rp_id where r_accept_status='YES' AND request_user=$id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_name = $row['p_name'];
                            $product_quantity = $row['r_qty'];
                            $unit = $row['p_unit'];
                            $request_date = $row['request_date'];
                            $recieve_date = $row['r_received_on'];
                            $request_serial = $row['request_serial'];
                            echo '
                        <tr>
                            <td>' . $product_name . '</td>
                            <td>' . $product_quantity . '</td>
                            <td>' . $unit . '</td>
                            <td>' . $request_date . '</td>
                            <td>' . $recieve_date . '</td>

                        </tr>
                        ';
                        }

                        ?>
                    </table>
                    <!-- content of the request history table ends here -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("sidebar_lower.php");

?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".mymodal").on("click",function(){
            // alert("hello");
            var myid = $(this).data('id');
            $("#serno").val(myid);
           $('#exampleModal').modal('show');
            
        });
    });
</script>