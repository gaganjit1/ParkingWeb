<html>

   <head>
  	<title>Chart</title>
	
	<!--<link rel="stylesheet" type="text/css" href="styles.css"> -->

  	<!-- You need to include the following JS file to render the chart.
  	When you make your own charts, make sure that the path to this JS file is correct.
  	Else, you will get JavaScript errors. -->

  	<script src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.carbon.js"></script>
  </head>

   <body class="chart">
   
	<?php include_once('MySQLconn.php');?>

  	<?php

     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT DATE_FORMAT(selected_date,'%m-%d') as 'selected_date', CASE WHEN Amount is NULL THEN 0 ELSE Amount END AS Amount FROM 30days 
					LEFT JOIN ( 
						SELECT CAST(time_of_purchase AS DATE) as 'DATE', SUM(minutes_paid) as 'Amount' FROM charges 
						WHERE spot = '" . $spot . "'
							and time_of_purchase >= (DATE_ADD(CURRENT_DATE, interval -29 day))
						GROUP BY CAST(time_of_purchase AS DATE) 
					) purchases on 30days.selected_date = purchases.DATE
					ORDER BY selected_date
					";															// IF SPOTS ARE NOT UNIQUE, ADD: ... garage = '" . $garage . "' and 

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
		
     	// If the query returns a valid response, prepare the JSON string
		if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Parking Usage in Minutes",
                  "showValues" => "0",
                  "theme" => "carbon",
				  "xAxisName" => "Day",
				  "yAxisName" => "Minutes Parked",
				  "slantlabels" => "1",
				  "baseFontSize" => "15",
				  "captionFont" => "Arial",
				  "captionFontSize" => "18",
				  "captionFontColor" => "#F00000"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["selected_date"],
              	"value" => $row["Amount"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

			/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

			?>
			
			<script>
			var Chart = FusionCharts('myFirstChart');
			if (Chart !== undefined) {
				Chart.dispose();
			}
			</script>
			
			<?php
			
        	$columnChart = new FusionCharts("column2D", "myFirstChart" , '100%', 500, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$dbhandle->close();
     	}

  	?>

  	<div id="chart-1"><!-- Fusion Charts will render here--></div>

   </body>


</html>