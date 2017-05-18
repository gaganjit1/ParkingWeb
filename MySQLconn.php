<?php

	$garage = isset($_POST['garage']) ? $_POST['garage'] : "";
	$spot = isset($_POST['spot']) ? $_POST['spot'] : "";

   include("includes/fusioncharts.php");

   $hostdb = "localhost";
   //$userdb = "root";
   //$passdb = "";
   $userdb = "id47124_spark";
   $passdb = "KirklandWater1";
   $namedb = "id47124_sparkdb";

   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   if ($dbhandle->connect_error) {
  	exit("Connection Error: ".$dbhandle->connect_error);
   }
?>