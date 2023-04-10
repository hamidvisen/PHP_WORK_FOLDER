
function handleChange(checkbox){ 
    if(checkbox.checked == true){
         
          
       document.getElementById('<?php echo $row['packages_name']?>').innerHTML="Added";
       document.getElementById('<?php echo $row['packages_name']?>').style.backgroundColor="red";
       document.getElementById('<?php echo $row['packages_name']?>').style.color="white";
       document.getElementById('<?php echo $row['packages_name']?>').style.border="none";
    }
    else{
       console.log("uncheckkiya");
   }
}
<!-- <div class="ca1 card">
    <div class="card-header border-0 bg-white">
       <h3> Express Top Wash <span class="text-danger">▼</span></h3> <span class="badge text-bg-primary text-center pt-3">🕑20 min</span>
    </div>
    <div class="body">
        <div class="body1">
        <div class="card-text">
           <!-- <?php
            $i=0;
           while($row = mysqli_fetch_array($query)){
            $j=0;
            $services_array =explode(",", $row['package_services']);
            
        while($j<=sizeof($services_array)){  
              echo '<p><span class="text-danger border-danger border-2 rounded">✔</span>'.$services_array[$j].'</p>';
            $j += 1;
            }
            $i++;
        }
           ?> -->
            <!-- <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
            <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
            <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p> 
            <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
            <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p>
            <p><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</p></div>
       <img width="120px" height="120px" src="images/R.jpg" alt="..">
    </div>
    <h1 class="font-weight-bold"><u>ADD-ONS</u></h1>
     -->
     <!-- <?php
            $i=0;
           while($row1 = mysqli_fetch_array($query1)){
            $j=0;
            $services_array =explode(",", $row1['addon_services']);
            
        while($j<=sizeof($services_array)){  
            echo '<div class="adds"> <div><span class="text-danger border-danger border-2 rounded">✔</span>'.$services_array[$i].'</div>
            <input id="checkbox" name="'.$services_array[$i].'" class="tick" type="checkbox"> </div>';
            $j += 1;
            }
            $i++;
        }
           ?> -->
    <!-- <div class="adds"> <div><span class="text-danger border-danger border-2 rounded">✔</span>Happy Birthday</div>
    <input class="tick" type="checkbox"> </div>
    </div>  -->

    
    
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