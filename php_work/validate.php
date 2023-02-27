
<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
</head>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="styl1.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- <script src="js/countrystatecity.js?v2"></script> -->
<script src="//geodata.solutions/includes/countrystatecity.js"></script>

<body>
  <script>
    function check() {
      var a = document.getElementById("number").value;
      var x = document.getElementById("name").value;
      ///////name validation///////
      if (
        x.charAt(1) == x.charAt(2) &&
        x.charAt(2) == x.charAt(3) &&
        x.charAt(3) == x.charAt(4)
      ) {
        document.getElementById("message").innerHTML = "** invalid name **";
        return false;
      }
      //////////contact validation/////////
      if (a == "") {
        document.getElementById("message1").innerHTML =
          "** please fill mobile number **";
        return false;
      }
      if (isNaN(a)) {
        document.getElementById("message1").innerHTML =
          "** only digits are allowed **";
        return false;
      }
      if (a.length < 10) {
        document.getElementById("message1").innerHTML =
          "** length should be of 10 digit **";
        return false;
      }
      if (
        a.charAt(0) != 9 &&
        a.charAt(0) != 8 &&
        a.charAt(0) != 7 &&
        a.charAt(0) != 6
      ) {
        document.getElementById("message1").innerHTML =
          "** no. must start with 9/8/7/6 **";
        return false;
      }
    }
  </script>

  <div class="center">
    <div class="dabba">
      <form action="db.php" method='POST'>
        <label for="">Name :</label><br />
        <input type="text" name="name" id="name" required />
        <span id="message" style="color: red"></span>
        <br />
        <label for=""> Contact :</label><br /><input id="number" type="tel" name="contact" maxlength="10"
          required /><span id="message1" style="color: red"></span> <br />
        <label for=""> Mail :</label><br /><input type="email" name="mail" required /><br />
        <label for=""> DOB :</label><br /><input type="date" name="dob" id="birth_date" required />
        <div id="age_container"><span id="exact_age" style="color: red">age:</span><br /></div>
        <label for=""> Country :</label><br /><select name="country" class="countries form-control" id="countryId"
          name="country" required>
          <option value="">Select Country</option>
        </select><br />
        <label for=""> State :</label><br /><select name="state" class="states form-control" id="stateId" name="state"
          required>
          <option value="">Select State</option>
        </select><br />
        <label for=""> City :</label><br /><select name="city" class="cities form-control" id="cityId" name="city"
          required>
          <option value="">Select City</option>
        </select><br />
        <div class="btn">
          <button type="submit" name="submit"  onsubmit="return check()">submit</button>
        </div>
        <div class="btn">
          <button type="download" name="download"><a href="export.php">Export</a></button>
        </div>
        
      </form>
    </div>
  </div>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="function.js"></script>

<script>
  $(document).ready(function () {
    $("#age_container").on("click", function () {
      var mdate = $("#birth_date").val().toString();
      var yearThen = parseInt(mdate.substring(0, 4), 10);
      var monthThen = parseInt(mdate.substring(5, 7), 10);
      var dayThen = parseInt(mdate.substring(8, 10), 10);

      var today = new Date();
      var birthday = new Date(yearThen, monthThen - 1, dayThen);

      var differenceInMilisecond = today.valueOf() - birthday.valueOf();

      var year_age = Math.floor(differenceInMilisecond / 31536000000);
      var day_age = Math.floor(
        (differenceInMilisecond % 31536000000) / 86400000
      );

      if (
        today.getMonth() == birthday.getMonth() &&
        today.getDate() == birthday.getDate()
      ) {
        alert("Happy B'day!!!");
      }

      var month_age = Math.floor(day_age / 30);

      day_age = day_age % 30;

      if (isNaN(year_age) || isNaN(month_age) || isNaN(day_age)) {
        $("#exact_age").text("Invalid birthday - Please try again!");
      } else {
        $("#exact_age").html('Age : <span id=" age">' + year_age);
      }
    });
  });
</script>
