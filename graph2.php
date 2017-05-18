<html>

   <head>
  	<title>Chart2</title>
	
  	<script src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.carbon.js"></script>
  </head>

   <body class="chart">
   
    <?php include_once('MySQLconn.php');?> 
  
  	<?php
	
     	$strQuery2 = "SELECT DATE_FORMAT(selected_date,'%m-%d') as 'selected_date', CASE WHEN Amount is NULL THEN 0 ELSE (Amount/100) END AS Amount FROM 30days 
					LEFT JOIN ( 
						SELECT CAST(time_of_purchase AS DATE) as 'DATE', SUM(amount) as 'Amount' FROM charges 
						WHERE garage IN ('" . $garage . "') 
							and time_of_purchase >= (DATE_ADD(CURRENT_DATE, interval -29 day))
						GROUP BY CAST(time_of_purchase AS DATE) 
					) purchases on 30days.selected_date = purchases.DATE
					ORDER BY selected_date
					";


     	$result2 = $dbhandle->query($strQuery2) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
		

		if ($result2) {

        	$arrData2 = array(
        	    "chart" => array(
                  "caption" => "Amount Made By Garage",
                  "showValues" => "0",
				  "numberPrefix" => "$",
                  "theme" => "carbon",
				  "xAxisName" => "Day",
				  "yAxisName" => "Money Earned",
				  "slantlabels" => "1",
				  "baseFontSize" => "15",
				  "captionFont" => "Arial",
				  "captionFontSize" => "18",
				  "captionFontColor" => "#F00000"
              	)
           	);

        	$arrData2["data"] = array();

        	while($row2 = mysqli_fetch_array($result2)) {
           	array_push($arrData2["data"], array(
              	"label" => $row2["selected_date"],
              	"value" => $row2["Amount"]
              	)
           	);
        	}

        	$jsonEncodedData2 = json_encode($arrData2);


			?>
			
			<script>
			var Chart2 = FusionCharts('mySecondChart');
			if (Chart2 !== undefined) {
				Chart2.dispose();
			}
			</script>
			
			<?php
			
        	$columnChart2 = new FusionCharts("line", "mySecondChart" , '100%', 500, "chart-2", "json", $jsonEncodedData2);

        	$columnChart2->render();

        	$dbhandle->close();
     	}

  	?>

  	<div id="chart-2"><!-- Fusion Charts will render here--></div>

   </body>


</html>