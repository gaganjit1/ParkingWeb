<?php
include_once("GetData.php");
$json = GetData("10th");
$final = '{"data":[' . $json . ']}';

echo $final;
?>