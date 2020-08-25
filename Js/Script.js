

	/* login */

$(function() {

    $('#login-form-link').click(function(e) {
    	
		$("#login-form").delay(100).fadeIn(100);
 		$("#admin-form").fadeOut(100);
		$('#admin-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#admin-form-link').click(function(e) {
		
		$("#admin-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

})