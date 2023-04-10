<?php
session_start();
?>
<?php
require 'conn.php';


if (isset($_POST["done"])) {

    $_SESSION["arr"] = $_POST['checkboxvar'];
    
    header("Location: cart.php");


}

?>

<?php


$q = "SELECT service.packages_name, service.packages_img, service.package_services, add_on.addon_services
    FROM service
    INNER JOIN add_on ON service.packages_id = add_on.addon_id;";
$query = mysqli_query($con, $q);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col-md-1 ms-4">
                <img src="images/logo.jpg" alt="logo" class="rounded img-fluid" />
            </div>
            <div class="col-md-7"></div>
            <div class="col-md-1 pt-4 text-white text-center">Prices▼</div>
            <div class="col-md-1 pt-4 text-white text-md-center">Franchise▼</div>
            <div class="col-md-1 pt-4 text-white text-md-center">Info▼</div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="container-fluid bg-danger">
        &nbsp;

    </div>
   

    <!-- manufacture content -->


    <img class="ca shadow mb-5 rounded-3 border" src="images/R.jpg" alt="pic">
    <form method="post">
    <?php
    $i = 0;
    $GLOBALS['i'];

    while ($row = mysqli_fetch_array($query)) {

        echo '<div class="ca1 card mb-3">
        <div class="card-header border-0 bg-white">
           <h3> ' . $row['packages_name'] . ' <span class="text-danger">▼</span></h3> <span class="badge text-bg-primary text-center pt-3">🕑20 min</span>
        </div>
        <div class="body">
            <div class="body1">
            <div class="card-text">'
    ?>
        <?php $j = 0;

        $services_array = explode(",", $row['package_services']);

        while ($j < sizeof($services_array)) {
            echo '<p><span class="text-danger border-danger border-2 rounded">✔</span>' . $services_array[$j] . '</p>';
            $j += 1;
        }

        echo '<p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
                <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
                <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p> 
                <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
                <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
                <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p></div>
           <img width="120px" height="120px" src="images/' . $row['packages_img'] . '" alt=".."><input type="button" id="' . $row['packages_name'] . '" onclick="handle(this.id);" name="sum" value="ADD"></input>
           
        </div>
        <h1 class="font-weight-bold"><u>ADD-ONS</u></h1>' ?>
        <?php
       
        $column_query = "SELECT `packages_name` FROM `service`";
        $query1 = mysqli_query($con,  $column_query);
        $index = 0; ?>
        <script>
            const column_element = [];
        </script><?php
                    while ($column = mysqli_fetch_array($query1)) {


                        // $new_num[$index] = array($column[0]);
                        // print_r($new_num[$i]);
                    ?><script>
                column_element.push('<?php echo ($column[$index]); ?>');
            </script>
        <?php


                    }
                    // $r1[] = call_user_func_array('array_merge', $new_num);
                    // print_r($r1[0]);
        ?>

        <script>
        var inc = 1;
        var arr = [];
    function handle(button){
       
        window.event.preventDefault();
        console.log("HAppy");
       
        document.getElementById(button).setAttribute("value", "Added");
                    document.getElementById(button).style.backgroundColor = "red";
                    document.getElementById(button).style.color = "white";
                    document.getElementById(button).style.border = "none";
                    document.getElementById('btn').innerHTML = "View Cart" + inc+ "<sup>+</sup>";
                    inc++;
// ajax Worker

var q  = button;

$.ajax({
      type: 'POST',
      url: "test.php",
      data:{query:q},
      dataType: "JSON",
      success: function(resultData) { 
      
       arr.push(resultData);
       
     sessionStorage.setItem("add", JSON.stringify(arr));
     
        },
});
}
         function handleChange(checkbox) {
                var last = checkbox.charAt(checkbox.length - 1);
                window.alert(last);
                if (document.getElementById(checkbox).checked == true) {
                    window.alert(column_element[last]);
                     document.getElementById(column_element[last]).click();
                    document.getElementById(column_element[last]).setAttribute("value", "Added");
                    document.getElementById(column_element[last]).style.backgroundColor = "red";
                    document.getElementById(column_element[last]).style.color = "white";
                    document.getElementById(column_element[last]).style.border = "none";
                    document.getElementById('btn').innerHTML = "View Cart" + inc+ "<sup>+</sup>";
                    inc++;
                } else {
                    console.log("uncheckkiya");
                }
                
            }
        </script>
    <?php


        $j = 0;
        $services_array = explode(",", $row['addon_services']);

        while ($j < sizeof($services_array)) {
            echo '<div class="adds"> <div><span class="text-danger border-danger border-2 rounded">✔</span>'.$services_array[$j].'</div>
        <input id="check'.$i.'" name="checkboxvar[]" value="'.$services_array[$j].'" onchange="handleChange(this.id);"  class="tick" type="checkbox"> </div>';
            $j += 1;
        }


        echo '<div class="adds"> <div><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</div>
        <input class="tick" type="checkbox"> </div>
        </div>
        
       
    </div> ';
        // $GLOBALS['i'] += 1;
        $i++;
    }

    ?>



    </div>
    <button id="btn" type="submit" name="done" class="bg-danger text-white float-end border-0 sticky-bottom">View Cart</button>
    </form>


    <!-- footer part -->
    <hr class="underline">
    <div class="queue container-fluid">
        <h4 style="font-family:Georgia, 'Times New Roman', Times, serif;">The following premium domains are on sale.
        </h4>
        <p style="font-family:  Arial , sans-serif;line-height: 2;
            word-spacing: 10px;
            font-size: 16px;
            letter-spacing: 1px; ">Interested buyers may email at olacarwash[at]gmail[dot]com or call/whatsapp at
            73-111-08-114</p>
        <div class="ds-sldr">
            <div class="ds-sldr-trk">
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>
                <div class="ds-slide">
                    <img src="images/logo.jpg" width="100px" alt="...">
                </div>

            </div>

        </div>

    </div>
    <!-- <div  class="underline"> Hamid </div> -->
    <div class="container-fluid bg-black text-white">
        <div class="row">
            <div class="col-md-3  mt-3 mb-md-5">Heloo</div>
            <div class="col-md-3  mt-3 mb-md-5">
                <h4><u><b>CONTACT:</u></b></h4>
                <p class="contact"> A-133, DDA Sheds Okhla Phase-II, Near Crowne Plaza, Okhla, New Delhi-110020<br>
                    ☎ 88-5140-1212<br>
                    ✉ ocw.booking@gmail.com<br>
                    📅 Mon to Sun, 9am to 7pm</p>
            </div>
            <div class="col-md-3  mt-3 mb-md-5">
                <h4><u><b>SERVICES:</b></u></h4>
                <a class="ref1" href="#"> Car Washing Services</a><br>
                <a class="ref1" href="#">Sofa Dry Cleaning @Home</a><br>
                <a class="ref1" href="#">Steam Car Washing Services</a><br>
                <a class="ref1" href="#">Car Interior Dry Cleaning Services</a><br>
                <a class="ref1" href="#">Car Spa Services</a><br>
                <a class="ref1" href="#">Car Detailing Services</a><br>
                <a class="ref1" href="#">Paint Protection Film Services</a><br>
                <a class="ref1" href="#">Rubbing Polish Services</a><br>
                <a class="ref1" href="#">Teflon Coating Services</a><br>
                <a class="ref1" href="#">3M Teflon Coating Services</a><br>
                <a class="ref1" href="#">Meguiar's Teflon Coating Services</a><br>
                <a class="ref1" href="#">Ceramic Coating Services</a><br>
                <a class="ref1" href="#">9H Ceramic Coating Services</a><br>
                <a class="ref1" href="#">3M Ceramic Coating Services</a><br>
                <a class="ref1" href="#">Meguiar's Ceramic Coating Services</a><br>
                <a class="ref1" href="#">10H Ceramic Coating Services</a><br>
                <a class="ref1" href="#">Graphene Coating Services</a><br>
                <a class="ref1" href="#">Paint Protection Film (PPF)</a><br>
                <a class="ref1" href="#">Garware Car PPF Services</a><br>
                <a class="ref1" href="#">XPEL Car PPF Services</a><br>
                <a class="ref1" href="#">llumar Car PPF Services</a><br>
                <a class="ref1" href="#"> Madico Car PPF Services</a><br>
            </div>
            <div class="col-md-3  mt-3 mb-md-5">
                <h4><u><b>INFORMATION:</b></u></h4>
                <a class="ref" href="#">About us</a><br>
                <a class="ref" href="#">Services</a><br>
                <a class="ref" href="#">Contact us</a><br>
                <a class="ref" href="#">Photo Gallery</a><br>
                <a class="ref" href="#"> Video Gallery</a><br>
                <a class="ref" href="#"> Careers</a><br>
                <a class="ref" href="#"> FAQ</a><br>
                <a class="ref" href="#"> Disclaimer</a><br>
                <a class="ref" href="#"> Privacy Policy</a><br>
                <a class="ref" href="#"> Terms & Conditions</a><br>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-danger text-white">
        <div class="row">
            <div class="col-md-3  mt-3">
                <h4><u><b>CORPORATE OFFICE:</b></u></h4>
                Door2Door Car Wash, A-133, DDA Sheds Okhla Phase-II, Near Crowne Plaza, New Delhi-110020 (IN)<br>
                ✉ info[at]door2doorcarwash[dot]com
                📅 Mon to Sun, 9am to 7pm

            </div>
            <div class="col-md-3  mt-3">
                <h4><u><b>REGISTERED OFFICE:</b></u></h4>
                9-DSIIDC Industrial Shed, Mini Market Marg, DDA Flats Kalkaji, South Delhi, Delhi-110019 (IN)<br>
                ✉ info[at]door2doorcarwash[dot]com
                📅 Mon to Sun, 9am to 7pm
            </div>
            <div class="col-md-3  mt-3">
                <h4><u><b> HELPLINES:</b></u></h4>
                <a class="ref" href="#"> ☎ 73-111-08-111</a><br>
                <a class="ref" href="#"> ☎ 73-111-08-112</a><br>
                <a class="ref" href="#"> ☎ 73-111-08-113</a><br>
                <a class="ref" href="#"> ☎ 73-111-08-114</a><br>
                <a class="ref" href="#">☎ 73-111-08-115</a><br>
                <a class="ref" href="#">☎ 88-5140-12-12</a><br>
                <a class="ref" href="#">☎ 8527-22-77-33</a><br>

            </div>
            <div class="col-md-3  mt-3">
                <h4><u><b>SOCIALS: </b></u></h4>


            </div>


        </div>

    </div>

</body>


</html>