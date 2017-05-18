<?php
include_once("GetData.php");
$json = GetData("7th");
$final = '{"data":[' . $json . ']}';

echo $final;
?>