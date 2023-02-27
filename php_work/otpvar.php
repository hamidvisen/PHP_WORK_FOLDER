
    <?php
    session_start();
     $now = time();
            
      
             if($now > $_SESSION['expire']) {
                 session_unset();
                
    ?>
    <script>alert("Session has been destroyed!!")</script>
    <?php
   
           }
     
if(isset($_POST['done'])){
          	$otpvar = $_POST['otp'];
          	
              if($otpvar == $_SESSION["otp"])
              {
                  echo "Correct otp"; 
                  ?><script>
                   alert("Welcome on to my world");
                  
                </script>
                  <?php 
                 
              }
              else{
                  echo "Enter correct OTP";
              }
             
      }
?>
<html>
<link rel="stylesheet" href="styles.css">
<body>
<form method="post">
<label for="otp"><b>Enter OTP</b></label>
    <input type="text" placeholder="Enter OTP" name="otp">
     <button type="submit" name="done">OTP Verification</button>
</form>
</body>
</html>
