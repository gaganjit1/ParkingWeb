<?php
include_once("GetData.php");
$json = GetData("4th");
$final = '{"data":[' . $json . ']}';

echo $final;
?>