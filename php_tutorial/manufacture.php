<?php
session_start();
?>
<?php
require 'conn.php';

// Echo session variables that were set on previous page
  



$query = mysqli_query($con, $_SESSION["q"]);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="manufacture.css" />
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha1-dist\css\bootstrap.css" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
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
    <!-- <div class="container-fluid">

        <div class="con">
            <img class="img1" src="images/OIP.jpg" alt="middle photo">
            <p class="p1">Door2Door Car Wash</p>
            <p class="p2">The Chain of Cleaning Mechanism</p>
            <p class="p3">CHECK PRICES</p>
        </div>

    </div> -->

    <!-- manufacture content -->
    <div class="ca card shadow p-3 mb-5 bg-body rounded-3" style="width: 70%;">
        <div class="card-header border-0 bg-white ms-0">
            <div class="mt-2"> <i class='bi bi-arrow-left me-1'></i>Select a manufacture</div>
            <button type="button" class="btn-close mt-2" aria-label="Close"></button>
        </div>
        <div class="input-tag border p-2 mb-3">
            <i class="bi bi-search"></i> <input type="text" style="border: none;" placeholder="Search Brands">
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row text-center">
                    

    <?php
    $i = 1;
    ?>
          <?php              while($row = mysqli_fetch_array($query)){
            echo '<a href="model.php?var1='.$i++.'&var2='.$row['car_name'].'">';
    echo '<div class="col-md-3 gy-1">
    <div class="card shadow-sm"><div class="card-body">
                                <img src="images/'.$row['car_img'].'" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">'.$row['car_name'].'</h3>

                            </div>  </div>
                            </div>';
                            echo '</a>';
     
    

}?>
                    
                    <div class="col-md-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gy-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gy-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gy-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gy-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gy-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 gy-3">
                        <div class="card shadow-sm">

                            <div class="card-body">
                                <img src="images/R.jpg" class="card-img mb-3 rounded-3" alt="...">
                                <h3 class="card-text">Bugatti</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

    </div>

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
        <!-- <div class="container-fluid overflow-x-scroll">
                <div class="row flex-row flex-nowrap ">
                    <div class="main">
                        <marquee class="marq"
                                 bgcolor="Green"
                                 direction="left"
                                 loop="">
                                 <img src="images/logo.jpg" width="100px"  alt="...">
                                 <img src="images/logo.jpg" width="100px"  alt="...">
                                 <img src="images/logo.jpg" width="100px"  alt="...">
                                 
                        </marquee></div>
                    <div class="col-md-3 border"><div class="card">
                        <div class="card-body">
                            <img src="images/logo.jpg" width="5px" class="card-img" alt="...">
                          </div></div></div>
                    <div class="col-md-3 border"><div class="card">
                        <div class="card-body">
                            <img src="images/logo.jpg" width="5px" class="card-img" alt="...">
                          </div></div></div>
                    <div class="col-md-3 border">1</div>
                    <div class="col-md-3 border">1</div>
                    <div class="col-md-3 border">1</div>
                    <div class="col-md-3 border">1</div>
                    <div class="col-md-3 border">1</div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
            </div> -->
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
            <div class="col-md-3 mt-3 mb-md-5">
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