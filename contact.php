<!DOCTYPE html>
<html>
<head>
	<title>SPark</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src ="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="checkbox.css">
	<script src="DataTables/DataTables.js"></script>

	<script src="https://cdn.firebase.com/js/client/2.3.1/firebase.js"></script>
	
	<link rel="icon" href="Images/favicon.png">
</head>
<body><div id="main">

	<?php include_once ("menu.php"); ?>
<script>
	$(document).ready(function () {
	  $(".nav li").removeClass("active");
	  $('#contact').addClass('active');

	});
</script>


	
<h1 style="color:white;">Contact Us</h1>

<div style="display: table;">
	<div style="display: table-row">
		<div style="color:white;display:table-cell;width:800px;">
		<h3 style="color:white;width:800px;background:rgba(0,0,0,0.3);padding:20px;margin-top:20px;">
			SPark

		<p style="font-size:16px;color:white;width:800px;">
		<br>
		Charles W. Davidson<br>
		College of Engineering<br>
		San José State University<br>
		One Washington Square,<br>
		San José, CA 95192-0080
		</p>
		</h3>			
		</div>
		
		<div style="color:white;display: table-cell;vertical-align:middle;width:100%;padding-left: 50px;padding-top: 20px;">
				<div id="map" style="margin: auto;"></div>
		</div>
	</div>
</div>		

<script>
  function initMap() {
	var uluru = {lat: 37.337, lng:  -121.881594};
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 16,
	  center: uluru
	});
	var marker = new google.maps.Marker({
	  position: uluru,
	  map: map
	});
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDlrfKeuteF5W4YT12nBSyCV9tD8KLHhk&callback=initMap">
</script>


</div><?php include_once("footer.php"); ?></body>
</html>