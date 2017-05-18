function payInit() {
	
	$.fn.dataTable.ext.errMode = 'none';
	
	var table = $('#transactions').on('error.dt', function(e, settings, techNote, message) {
	    console.log( 'An error has been reported by DataTables: ', message);
		})
		.DataTable( {
		"bDeferRender": true,
        "sPaginationType": "full_numbers",

		"ajax": {
			"url": "DataTables/GetPayments.php",
			"type": "POST"
		},

		"columns" : [
		{"data" : "time_of_purchase"},
		{"data" : "name"},
		{"data" : "garage"},
		{"data" : "spot"},
		{"data" : "minutes_paid"},
		{"data" : "amount"},
		{"data" : "email"},
		{"data" : "charge_token"},
		],	

		"createdRow": function ( row, data, index ) {
			$(row).css('background-color', 'white')
			/*if (data.status == "occupied")
				$(row).addClass("warning");
			else
				$(row).addClass("success");

			if (data.time > data.paid)
				$(row).addClass("danger");
			else
				if (od.checked)
					$(row).css('display', 'none')
			*/
		},
		
		destroy: true
   
    } );
	
	table.on( 'xhr', function ( e, settings, json ) {
		//console.log( 'Ajax event occurred. Returned data: ', json );
	} );

	setInterval( function () {table.ajax.reload(null, false);}, 60000 );
	
	return table;
}









function init() {
	
	$.fn.dataTable.ext.errMode = 'none';
	
	var table = $('#sensors').on('error.dt', function(e, settings, techNote, message) {
	    console.log( 'An error has been reported by DataTables: ', message);
		})
		.DataTable( {
		"bDeferRender": true,
        "sPaginationType": "full_numbers",

		"ajax": {
			"url": "DataTables/All.php",
			"type": "POST"
		},
		
		"columns" : [
		{"data" : "id"},
		{"data" : "garage"},
		{"data" : "floor"},
		{"data" : "status"},
		{"data" : "time"},
		{"data" : "paid"},
		{"data" : "current"}
		],	
		
		"createdRow": function ( row, data, index ) {
			if (data.status == "occupied")
				$(row).addClass("warning");
			else
				$(row).addClass("success");

			if (data.time > data.paid)
				$(row).addClass("danger");
			else
				if (od.checked)
					$(row).css('display', 'none')
		},
		
		destroy: true
   
    } );
	
	table.on( 'xhr', function ( e, settings, json ) {
		//console.log( 'Ajax event occurred. Returned data: ', json );
	} );

	setInterval( function () {table.ajax.reload(null, false);}, 60000 );
	
	return table;
}


