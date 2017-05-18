<?php
include_once("GetData.php");
$json = GetData("4th") . "," . GetData("7th") . "," . GetData("10th");
$final = '{"data":[' . $json . ']}';

echo $final;
?>