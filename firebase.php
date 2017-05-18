<span id = "object" style="display:none;"></span>
<script src="https://cdn.firebase.com/js/client/2.3.1/firebase.js"></script>

<script>
		
		var preObject4 = document.getElementById("firebaseData4");	
		const dbRefObject4 = firebase.database().ref().child('Garage').child("4th");
		dbRefObject4.on('value', snap => {		
			preObject4.innertext = snap.val();
		});
		
	
		
		var preObject7 = document.getElementById("firebaseData7");
		const dbRefObject7 = firebase.database().ref().child('Garage').child("7th");
		dbRefObject7.on('value', snap => {
			preObject7.innertext = snap.val();
		});
		
	
		
		var preObject10 = document.getElementById("firebaseData10");
		const dbRefObject10 = firebase.database().ref().child('Garage').child("10th");
		dbRefObject10.on('value', snap => {	
			preObject10.innertext = snap.val();
		});
		


</script>











<?php
	
	function PatchData1($values) {
		
		$data = json_encode($values);
		
		$url = "https://spark-94584.firebaseio.com/test_api/types.json";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);                               
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
		if(curl_errno($curl)){
			echo 'Curl error: ' . curl_error($curl);
		}
		curl_close($curl);
	
	}
	
	
	function GetData($garagenumber) {

		$url = "https://spark-94584.firebaseio.com/Garage/".$garagenumber.".json";
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);                               
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
		
		$json = curl_exec($curl);
		
		if(curl_errno($curl)){echo 'Curl error: ' . curl_error($curl);}
		curl_close($curl);

		return $json;
	}
	
	

	
		
?>