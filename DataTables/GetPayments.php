<?php
	
	include ("connection.php");
	$query = "SELECT time_of_purchase, name, garage, spot, minutes_paid, amount, email, charge_token FROM charges";
	$conn = mysqli_query($dbx,$query);
	
	$table = "";
	
	while($row = mysqli_fetch_array($conn)){		
		$table.='{
				  "time_of_purchase":"'.$row['time_of_purchase'].'",
				  "name":"'.$row['name'].'",
				  "garage":"'.$row['garage'].'",
				  "spot":"'.$row['spot'].'",
				  "minutes_paid":"'.$row['minutes_paid'].'",
				  "amount":"'.$row['amount'].'",
				  "email":"'.$row['email'].'",
				  "charge_token":"'.$row['charge_token'].'"
				},';		
	}	
	$table = substr($table,0, strlen($table)-1);
	echo '{"data":['.$table.']}';	
?>
