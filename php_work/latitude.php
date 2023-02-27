<html>
<link rel="stylesheet" href="style2.css">
    <body>
        <div id="container"> 
            <h2 id="hd">Getting Position</h2>
        <label for="lat"><b>Latitude:</b></label>
        <input type="number" id="lat" maxlength="20" required>
        <span id="err"> </span><br>
       
        
        <label for="log"><b>Latitude:</b></label>
        <input type="number" id="log" maxlength="20" required>
        <span id="err1"> </span><br>
        <button type="submit"  onclick="myFunction()">Submit</button>
        
</div>
        <script>
            
           function myFunction(){
            document.getElementById("lat").onfocus = function() { document.getElementById("err").innerHTML = "";};
        


            var lat = document.getElementById("lat").value;

           
           if(lat==""){
            document.getElementById("err").innerHTML="latitude must be filled up";
            return;
           }  
           
                     
             lat.toString();
             position = 2;
             b = ".";
             var output = [lat.slice(0, position), b, lat.slice(position)].join('');
           
            var log = document.getElementById("log").value;

            if(log==""){
                document.getElementById("err1").innerHTML="longitude must be filled up";
            return;
           } 
           document.getElementById("log").onfocus = function() { document.getElementById("err1").innerHTML = "";};
            log.toString();
             position = 2;
             b = ".";
             var output1 = [log.slice(0, position), b, log.slice(position)].join('');
           
            const app = `http://www.google.com/maps/place/`;
            const tick= `,`
           
            const search = `${app}${output}${tick}${output1}`;
            window.location=search;
        }
       

        </script>


    </body>
</html>