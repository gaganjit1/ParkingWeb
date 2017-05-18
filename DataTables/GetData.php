<?php

			
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
	}
	
?>
