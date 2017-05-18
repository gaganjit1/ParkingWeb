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

<div class="tab">
  <button id="status" class="tablinks" onclick="openTab(event, 'Statuses')">Statuses</button>
  <button id="transaction" class="tablinks" onclick="openTab(event, 'Transactions')">Transactions</button> 
  <button id="trends" class="tablinks" onclick="openTab(event, 'Trends')">Trends</button>
</div>

<div id="Statuses" class="tabcontent" style="display:block;background:rgba(0,0,0,0.3);padding-left: 30px;">
<script>document.getElementById("status").className += " active";</script>
<h2 style="color:white;">Garage Status</h2>
<br>


<div id="selection_bar" style="display:block;background:rgba(0,0,0,0.3);padding:10px;max-width:100%;width:750px;height:100px;">
<p style="font-size:10px;margin:0px;">&nbsp</p>
<h4 style="color:white;display: inline;">Garage:</h4>
<br>
<select id="garagesel" name="garagesel" class="form-control" style="width:200px;margin-right:50px;display:inline;" onChange="go()">
	<option value="4th" selected="selected">4th Street Garage</option>
	<option value="7th">7th Street Garage</option>
	<option value="10th">10th Street Garage</option>
	<option value="All" selected="selected">All Garages</option>
</select>


<div class="checkbox" id="checkbox1" style="padding-top:7px;height: 20px;display:inline;">
	<input id="overdue" type="checkbox">
	<label for="overdue" style="color:white;font-size:16px;">Show Only Overdue Spots</label>
	<style>#checkbox1 label::after{font-size:13px;}</style>
</div>

<br>
</div>


<br>

<h3 style="color:white;">Current Parking Status</h3>

	
<div class="dataTables_scroll">
<div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
<div id="tablecontainer" class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 850px; padding-right: 30px;">
<table id="sensors" class="display stripe table table-hover" cellspacing="0">
        <thead>
            <tr>
			    <th>Sensor ID</th>
				<th>Garage</th>
                <th>Floor</th>
                <th>Status</th>
                <th>Time Spent</th>
                <th>Time Paid</th>
				<th>Current User</th>
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
<br>
</div>





<div id="Transactions" class="tabcontent" style="background:rgba(0,0,0,0.3);padding-left: 30px;">
<h2 style="color:white;">Parking Transactions</h2>
<br><!--
<div class="forms">
<select id="garagesel2" name="garagesel2" class="form-control" style="width:200px" onChange="go2()">
	<option value="4th" selected="selected">4th Street Garage</option>
	<option value="7th">7th Street Garage</option>
	<option value="10th">10th Street Garage</option>
	<option value="All" selected="selected">All Garages</option>
</select>
</div>-->
<br>


<div class="dataTables_scroll">
<div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
<div id="tablecontainer2" class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1042px; padding-right: 30px;">
<table id="transactions" class="display stripe table table-hover" cellspacing="0">
        <thead>
            <tr>
                <th>Time of Purchase</th>
				<th>Name</th>
				<th>Garage</th>
				<th>Spot</th>
				<th>Minutes Bought</th>
				<th>Amount</th>
				<th>Email ID</th>
                <th>Account ID</th>
            </tr>
        </thead>
        <tbody id ="transact">
        </tbody>
</table>
</div>
</div>
</div>
	
<script>
	var table2 = payInit();
	var od2 = document.getElementById("overdue2");
	
	function go2(){
		var sel = document.getElementById('garagesel2');
		var selval = sel.options[sel.selectedIndex].value;
		
		table2.ajax.url('DataTables/GetPayments.php').load();		

	}
</script>
<br>
</div>







<div id="Trends" class="tabcontent" style="background:rgba(0,0,0,0.3);padding-left: 30px;">
<h2 style="color:white;">Parking Trends</h2>
<br>
<div id="selection_bar2" class="chartinput" style="display:block;background:rgba(0,0,0,0.3);padding:10px;max-width:100%;height:100px;">
<?php include_once ("DataTables/GetData.php"); ?>

<p style="font-size:10px;margin:0px;">&nbsp</p>
<h4 style="color:white;display: inline;">Garage:</h4>
<h4 style="color:white;display: inline;padding-left:185px;">Spot:</h4>
<br>
<select id="garagesel3" name="garagesel3" class="form-control" style="width:200px;margin-right:50px;display:inline;" onChange="go3()" method="post">
	<option value="4th" selected="selected">4th Street Garage</option>
	<option value="7th">7th Street Garage</option>
	<option value="10th">10th Street Garage</option>
	<option value="4th','7th','10th">All Garages</option>
</select>


<select id="spotsel" name="spotsel" class="form-control" style="width:200px;display:inline;" onChange="go33()" method="post">
</select>

</div>


<br></br>
	<div id="container" class="charts1" style="width: 90%;"></div>
	<div id="container" class="charts2" style="width: 90%;"></div>
</div>
<script>

	var post = { 
		garage:"4th"
	};
	$('#spotsel').load("DataTables/ParkingSpot.php", post);	
	go3();
		
	function go3(){
		var sel = document.getElementById('garagesel3');
		var selval = sel.options[sel.selectedIndex].value;
			
		var post = { 
			garage:selval
		};
				
		//$('#spotsel').load("DataTables/ParkingSpot.php", post);	
		
		
		$(document).ready(function(){
			$("#spotsel").load("DataTables/ParkingSpot.php", post, function(){

				var sel2 = document.getElementById('spotsel');
				var selval2 = sel2.options[sel2.selectedIndex].value;
				
				var post = { 
					garage:selval,
					spot: selval2
				};
				
				$('.charts1').load("graph.php", post);
				$('.charts2').load("graph2.php", post);
			
			
			});
		});
		
	}
	
	function go33(){
		var sel = document.getElementById('garagesel3');
		var selval = sel.options[sel.selectedIndex].value;
		
		var sel2 = document.getElementById('spotsel');
		var selval2 = sel2.options[sel2.selectedIndex].value;
		
		var post = { 
			garage:selval,
			spot: selval2
		};
		
				
		$('.charts1').load("graph.php", post);
		$('.charts2').load("graph2.php", post);
	}
</script>

</div>


<script>
     $(window).load(function() {
     $('#load').hide();
  });
  
  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


</div><?php include_once("footer.php"); ?></body>
</html>