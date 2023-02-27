
<script>
function validateName() {
  let x = document.getElementById("firstname").value;
 
  if (x=="") {
    document.getElementById("err").innerHTML = "Name must be filled out";
    <?php $name= false; ?>
  }
  if ( x.length>2) {
    document.getElementById("err").innerHTML = "";
    <?php $name= true; ?>
  }
}
function validate() {
  let x = document.getElementById("firstname").value;
 
  if ( x.length<2) {
    document.getElementById("err").innerHTML = "Name must be of 3 letter";
    <?php $name= false; ?>
  }
  

}

function phoneNumber()
{
  var phoneno = /^[+]*[(]{0,1}[5-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
 
  if(document.getElementById("phone").value.match(phoneno))
  {
    document.getElementById("err2").innerHTML = "";
    <?php $num= true; ?>
  }
  else
  {
    document.getElementById("err2").innerHTML = "Invalid Number";
    <?php $num= false; ?>
  }
  }

function validnum() {
  let x = document.getElementById("phone").value;
 ;
  if (x=="") {
    document.getElementById("err2").innerHTML = "Number must be of 10 digit";
    <?php $num= false; ?> 
  }
}

  function emailnum() {
    var emailNo = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if(document.getElementById("email").value.match(emailNo)){
    <?php $emailNo= true; ?>
  }
  else{
    document.getElementById("err3").innerHTML = "Enter valid email";
    <?php $emailNo= false; ?>
  }
  }
  </script>
  
