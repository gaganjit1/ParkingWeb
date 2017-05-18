<!DOCTYPE html>
<html>
<head>
	<title>SPark</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src ="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="checkbox.css">

	<script src="https://cdn.firebase.com/js/client/2.3.1/firebase.js"></script>
	<link rel="icon" href="Images/favicon.png">
</head>
<body><div id="main">
	<div id="load">
		<img src="Images/gears.gif" style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
	</div>
	
	
	<?php include_once ("menu.php"); ?>

<script>
	var last_selected = "All";
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
<span id = "firebaseData4" style="display:none;"></span>
<span id = "firebaseData7" style="display:none;"></span>
<span id = "firebaseData10" style="display:none;"></span>
<?php include_once ("firebase.php"); ?>
<script>


	
	function createTable(obj, garage){
		var od = document.getElementById("overdue");
		//FOR EACH ROW
		for(var i=0;i<Object.keys(obj).length;i++)
		{

			//var paid = obj[Object.keys(obj)[i]]["paid"] == 1 ? "Yes" : "No";
		
			var type = obj[Object.keys(obj)[i]]["status"] == "empty" ? "success" : obj[Object.keys(obj)[i]]["time"] <=  obj[Object.keys(obj)[i]]["paid"] ? "warning" : "danger";
			
			var tr="<tr class='"+type+"'>";
			var td1="<td>"+obj[Object.keys(obj)[i]]["id"]+"</td>";
			var td2="<td>"+garage+"</td>";
			var td3="<td>"+obj[Object.keys(obj)[i]]["floor"]+"</td>";
			var td4="<td>"+obj[Object.keys(obj)[i]]["status"]+"</td>";
			var td5="<td>"+obj[Object.keys(obj)[i]]["time"]+"</td>";
			var td6="<td>"+obj[Object.keys(obj)[i]]["paid"]+"</td>";
			var td7="<td>"+obj[Object.keys(obj)[i]]["viewers"]+"</td></tr>";
			//alert(tr+td1+td2+td3+td4+td5+td6);
			
			if (!od.checked)
				$('#parking > tbody').append(tr+td1+td2+td3+td4+td5+td6+td7); 
			else
				if (type == "danger")
					$('#parking > tbody').append(tr+td1+td2+td3+td4+td5+td6+td7);					

		} 
	}
	
	
	function refresh(selval){
		//CLEAR TABLE
		var Table = document.getElementById("parkingbody");
		Table.innerHTML = "";


		var Data4 = document.getElementById("firebaseData4");
		var Data7 = document.getElementById("firebaseData7");
		var Data10 = document.getElementById("firebaseData10");
		
		f4 = firebaseData4.innertext == null? "ABC" : firebaseData4.innertext;
		f7 = firebaseData7.innertext == null? "ABC" : firebaseData7.innertext;
		f10 = firebaseData10.innertext == null? "ABC" : firebaseData10.innertext;
		
		if (selval == "4th")
			createTable(f4, "4th");
		if (selval == "7th")
			createTable(f7, "7th");
		if (selval == "10th")
			createTable(f10, "10th");
		if (selval == "All"){
			createTable(f4, "4th");
			createTable(f7, "7th");
			createTable(f10, "10th");
	
	}
	}
	function go(){

		var sel = document.getElementById('garagesel');
		var selval = sel.options[sel.selectedIndex].value;

		refresh(selval);

	}
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
	<label for="overdue" style="color:white;">
		Show Only Overdue Spots
	</label>
</div>
</div>
<br>


<h3 style="color:white;">Current Parking Status</h3>

	
<table id="parking" class="table table-hover table-bordered table-nonfluid" cellspacing="0">
        <thead>
            <tr>
                <th width = "100px">Sensor ID</th>
                <th width = "100px">Garage</th>
                <th width = "100px">Floor</th>
                <th width = "100px">Status</th>
                <th width = "100px">Time Spent</th>
                <th width = "100px">Time Paid</th>
                <th width = "100px">Viewers</th>
            </tr>
        </thead>
        <tbody id ="parkingbody">
        </tbody>
</table>
	
<script>
	var four = <?php echo GetData("4th"); ?>;
	var seven = <?php echo GetData("7th"); ?>;
	var ten = <?php echo GetData("10th"); ?>;

	createTable(four, "4th");
	createTable(seven, "7th");
	createTable(ten, "10th");
	int_refresh = setInterval(function(){ go();}, 1000);

</script>

<script>
     $(window).load(function() {
     $('#load').hide();
  });
</script>

	

</div><?php include_once("footer.php"); ?></body>
</html>