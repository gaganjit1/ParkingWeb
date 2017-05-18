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
	  $('#about').addClass('active');

	});
</script>
<h1 style="color:white;">About Us</h1>
<div style="display: table;">
	<div style="display: table-row">
		<div style="color:white;display:table-cell;width:800px;">
		<p style="font-size:16px;color:white;width:800px;background:rgba(0,0,0,0.3);padding:20px;margin-top:20px;">
					&emsp;&emsp;An efficient parking system is an integral part of every major infrastructure project, whether it is municipal, commercial, or residential. A majority of parking structures, such as those in shopping complexes, use a traditional system to locate parking spaces. In such systems, a driver must navigate through what could be an entire parking lot, to find an open spot. Newer systems, such as those available in Santana Row or San Francisco, incorporate ultrasonic sensors in addition to LEDs above each parking space to display the status of each spot.<br><br>
					&emsp;&emsp;Current parking solutions that implement overhead LEDs offer more visibility in terms of finding an available parking space. The main drawback of such solutions, however, is that they require drivers to be in proximity of the available parking spots. Hence, when few spaces are available, drivers must still navigate throughout the parking garages to find an available space. This constant searching often results in congestion, tardiness, and wasted time.<br><br>
					&emsp;&emsp;The primary objective of our solution, SPark, is to reduce traffic in and around parking garages while reducing the time that it takes for a driver to find a parking space. Similar to other state of the art solutions, SPark utilizes ultrasonic sensors and LEDs along with a microcontroller to detect and indicate the availability of parking spots. Unlike other solutions, however, SPark includes a voice-enabled Android application that directs users to available parking spaces. The application polls a Firebase database that is populated by the statuses of each of the garage's sensors. This process allows SPark users to determine the location of available spots before entering the parking structure.
		</p>	
		</div>

		<div style="color:white;display: table-cell;vertical-align:middle;width:100%;padding-left: 50px;">
			<div style="text-align: center;">
				<img src="Images/Hardware.PNG" class="image" style="margin: auto;">
				<h4 style="margin: auto;">Conceptual Hardware Diagram</h4>
			</div>
		</div>
		
	</div>
</div>			


</div><?php include_once("footer.php"); ?></body>
</html>