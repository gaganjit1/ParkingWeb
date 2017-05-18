
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="chartinput">
<select id="garagesel3" name="garagesel3" class="form-control" style="width:200px" onChange="go3()" method="post">
	<option value="4th" selected="selected">4th Street Garage</option>
	<option value="7th">7th Street Garage</option>
	<option value="10th">10th Street Garage</option>
</select>
<div class="checkbox">
	<input id="overdue2" type="checkbox">
	<label for="overdue2" style="color:white;">Show Only Overdue Spots</label>
</div>
</div>
<br>
	<div id="chart1" style="width: 90%;"></div>
</div>


<script>
	var od2 = document.getElementById("overdue2");
	
	function go3(){
		var sel = document.getElementById('garagesel3');
		var selval = sel.options[sel.selectedIndex].value;
		
		var post = { 
			garage:selval, 
			spot:"A23"
		};
		$('#chart1').load("graph.php", post);

	}
</script>
