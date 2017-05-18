<?php

$user = $_POST['username'];
$pass = $_POST['password'];
$db = $_POST['db'];
$query = $_POST['query'];
//$query = "INSERT INTO 4th VALUES ('A17', 3, 12)";


$mysqli = mysqli_connect("localhost",$user,$pass,$db);

// Check connection
if (mysqli_connect_errno())
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

else
	$result = $mysqli->query($query);

mysqli_close($mysqli);
?>
