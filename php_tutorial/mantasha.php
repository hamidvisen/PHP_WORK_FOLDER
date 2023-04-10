<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<select id="brand"> 
	<option value="1" >
		TATA
	</option>
	<option value="2" >
		Maruti
	</option> </select>
	<select id="models"></select>


</body>
<script type="text/javascript">
	$(document).ready(function(){
$("#brand").change(function() {
	var brand_id=$(this).val();
	alert (brand_id);
$.ajax({
      type: 'POST',
      url: "getmodel.php",
      data:{brandid:brand_id},
      dataType: "JSON",
      success: function(resultData) { 
         swal(resultData); 
         $("#models").html(resultData);
    }
});
})
	});
</script>
</html>

