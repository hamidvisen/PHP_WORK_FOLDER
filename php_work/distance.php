<div id="container">
        <!-- <div class="img">
            <img src="google-maps.png" alt="map logo" width="50px" height="50px">
        </div> -->
        <label for="lat"><b>Latitude:</b></label>
        <input type="number" id="lat1" maxlength="20" required>
        <label for="log"><b>Longitude:</b></label>
        <input type="number" id="log1" maxlength="20" required><br>
        <label for="lat"><b>Latitude:</b></label>
        <input type="number" id="lat2" maxlength="20" required>
        <label for="log"><b>Longitude:</b></label>
        <input type="number" id="log2" maxlength="20" required>
        <div class="btn">
            <button type="submit" onclick="myFunction()">search</button>
        </div>
        <span>Distance = <span id="dist">0</span> KM </span>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?&libraries=geometry"></script>
        <script>
            function myFunction(){
                
        
            var lat1 =document.getElementById("lat1").value;
            var log1 =document.getElementById("log1").value;
            var lat2 =document.getElementById("lat2").value;
            var log2 =document.getElementById("log2").value;
            var p1 = new google.maps.LatLng(lat1, log1);
            var p2 = new google.maps.LatLng(lat2, log2);

            console.log(calcDistance(p1, p2));
            document.getElementById("dist").innerHTML=calcDistance(p1,p2);

            //calculates distance between two points in km's
            function calcDistance(p1, p2) {
                return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
            }
        
        }
    </script>