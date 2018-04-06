$(function() {
	//////////////////
	// Los tooltips //
	/////////////////
	$('[data-toggle="tooltip"]').tooltip();


	$(function() {
		$("#flash_message").fadeTo(2000, 500).slideUp(500, function(){
				$("#flash_message").slideUp(800);
		});
	});


});
