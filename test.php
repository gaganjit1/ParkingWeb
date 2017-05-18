<!DOCTYPE html>
<html>
<head>
	<title>SPark</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src ="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://cdn.firebase.com/js/client/2.3.1/firebase.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<link rel="icon" href="Images/favicon.png">
</head>
<body><div id="main">

<div id="tablecontainer" style="width: 800px;">
<table id="sensors" class="display stripe table table-hover" cellspacing="0" style="width: 800px;">
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


<script>
$(document).ready(function() {
	
	var table = $('#sensors').DataTable( {
		"bDeferRender": true,
        "sPaginationType": "full_numbers",

		"ajax": {
			"url": "DataTables/All.php",
			"type": "POST"
		},
		
		"columns" : [
		{"data" : "id"},
		{"data" : "garage"},
		{"data" : "floor"},
		{"data" : "status"},
		{"data" : "time"},
		{"data" : "paid"},
		{"data" : "viewers"}
		],	
		
		"createdRow": function ( row, data, index ) {
			if (data.status == "occupied"){
				$(row).addClass("warning");
			}
			else{
				$(row).addClass("success");
			}
			if (data.time > data.paid){
				$(row).addClass("danger");
			}
		  }
   
    } );
	
	setInterval( function () {table.ajax.reload();}, 30000 );
} );
</script>

	

</div><?php include_once("footer.php"); ?></body>
</html>