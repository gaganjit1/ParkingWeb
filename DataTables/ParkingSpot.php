<?php

	$garagechoice = isset($_POST['garage']) ? $_POST['garage'] : '';
	include_once("GetData.php");
	/*
	function GetData($garagenumber) {
		try {
			$url = "https://spark-94584.firebaseio.com/Garage/".$garagenumber.".json";
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);                               
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
			
			$json = curl_exec($curl);
			
			if(curl_errno($curl)){echo 'Curl error: ' . curl_error($curl);}
			curl_close($curl);
			
			$fin = preg_replace('/"(?!(current|floor|id|paid|status|time|viewers))[^"]+":/', "", $json);
			$final = substr($fin, 1, -1);
			$final = preg_replace('/}/', ',"garage":"'.$garagenumber.'"}', $final);
			return $final;
		}
		catch (Exception $e){
			return '{"current":"","floor":"","id":"","paid":"","status":"","time":"","viewers":""}';
		}
	}*/
	
	$garagechoice = ($garagechoice == "4th','7th','10th") ? "" : $garagechoice;
	$results = GetData($garagechoice); 
	

	$values = array();
	
	for ($i = 0; $i < strlen($results); $i++){		//QUICK AND TERRIBLE ALGORITHM TO GET 'ER DONE.
		if (substr($results, $i, 5) == '"id":'){
			$start = $i + 6;
			$j = $start;
			while ($results[$j] != '"')
				$j++;
			$values[] = substr($results, $start, $j - $start);
			$i = $j+1;
		}
	}
	
	
	if (count($values) > 0)
		echo '<option value="' . $values[0] . '" selected="selected">' . $values[0] . '</option>';

	for ($i = 1; $i < count($values); $i++){
		echo '<option value="' . $values[$i] . '">' . $values[$i] . '</option>';
	}
	
?>
