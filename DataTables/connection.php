<?php

function connect(){
    $db=$link = mysqli_connect("localhost", "id47124_spark", "KirklandWater1", "id47124_sparkdb")or die("Could not connect!");
	//$db=$link = mysqli_connect("localhost", "root", "", "id47124_sparkdb")or die("Could not connect!");
	
	return $db;
}

$dbx=connect();
?>