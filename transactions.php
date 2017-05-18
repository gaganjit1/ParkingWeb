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
	<div id="load">
		<img src="Images/gears.gif" style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
	</div>
	
	
	<?php include_once ("menu.php"); ?>

<script>
	//Check Firebase State
	firebase.auth().onAuthStateChanged(firebaseUser => {
		if (!firebaseUser){
			document.location = "index.php";
		}
	});

	$(document).ready(function () {
	  $(".nav li").removeClass("active");
	  $('#dashboard').addClass('active');		
	});
</script>


<h1 style="color:white;">Dashboard</h1>
<br>
<div class="forms">
<select id="garagesel" name="garagesel" class="form-control" style="width:200px" onChange="go()">
	<option value="4th" selected="selected">4th Street Garage</option>
	<option value="7th">7th Street Garage</option>
	<option value="10th">10th Street Garage</option>
	<option value="All" selected="selected">All Garages</option>
</select>
<div class="checkbox">
	<input id="overdue" type="checkbox">
	<label for="overdue" style="color:white;">Show Only Overdue Spots</label>
</div>
</div>
<br>


<h3 style="color:white;">Current Parking Status</h3>

<div class="dataTables_scroll">

<div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">

<div id="tablecontainer" class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 527px; padding-right: 17px;">

<table id="sensors" class="display stripe table table-hover" cellspacing="0">
        <thead>
            <tr>
                <th>Sensor ID</th>
				<th>Garage</th>
                <th>Floor</th>
                <th>Status</th>
                <th>Time Spent</th>
                <th>Time Paid</th>
                <th>Viewers</th>
            </tr>
        </thead>
        <tbody id ="parkingbody">
        </tbody>
</table>
</div>
</div>
</div>

<script>
	var table = init();
	var od = document.getElementById("overdue");
	
	function go(){
		var sel = document.getElementById('garagesel');
		var selval = sel.options[sel.selectedIndex].value;
		
		if (selval == "4th")
			table.ajax.url('DataTables/4th.php').load();		
		if (selval == "7th")
			table.ajax.url('DataTables/7th.php').load();	
		if (selval == "10th")
			table.ajax.url('DataTables/10th.php').load();	
		if (selval == "All")
			table.ajax.url('DataTables/All.php').load();	
	}
</script>

<script>
     $(window).load(function() {
     $('#load').hide();
  });
</script>


</div><?php include_once("footer.php"); ?></body>
</html>