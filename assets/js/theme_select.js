jQuery(document).ready(function($) {

		$(document).on('click', '#red', function(event) {
			removeOldTheme();
			$("body").addClass('skin-red');
			$.ajax({
					  method: "POST",
					  url: "../../controller/theme.php",
					  data: { theme: "skin-red" }
					})
					  .done(function( msg ) {
					    //alert( "Data Saved: " + msg );
					  });
		});
		$(document).on('click', '#yellow', function(event) {
			removeOldTheme();
			$("body").addClass('skin-yellow');
			$.ajax({
					  method: "POST",
					  url: "../../controller/theme.php",
					  data: { theme: "skin-yellow" }
					})
					  .done(function( msg ) {
					    //alert( "Data Saved: " + msg );
					  });
		});
		$(document).on('click', '#green', function(event) {
			removeOldTheme();
			$("body").addClass('skin-green');
			$.ajax({
					  method: "POST",
					  url: "../../controller/theme.php",
					  data: { theme: "skin-green" }
					})
					  .done(function( msg ) {
					    //alert( "Data Saved: " + msg );
					  });
		});
		$(document).on('click', '#purple', function(event) {
			removeOldTheme();
			$("body").addClass('skin-purple');
			$.ajax({
					  method: "POST",
					  url: "../../controller/theme.php",
					  data: { theme: "skin-purple" }
					})
					  .done(function( msg ) {
					    //alert( "Data Saved: " + msg );
					  });
		});
		$(document).on('click', '#blue', function(event) {
			removeOldTheme();
			$("body").addClass('skin-blue');
			$.ajax({
					  method: "POST",
					  url: "../../controller/theme.php",
					  data: { theme: "skin-blue" }
					})
					  .done(function( msg ) {
					    //alert( "Data Saved: " + msg );
					  });
		});
		$(document).on('click', '#black', function(event) {
			removeOldTheme();
			$("body").addClass('skin-black');
			$.ajax({
					  method: "POST",
					  url: "../../controller/theme.php",
					  data: { theme: "skin-black" }
					})
					  .done(function( msg ) {
					    //alert( "Data Saved: " + msg );
					  });
		});
	});
	function removeOldTheme(argument) {
		$("body").removeClass('skin-red');
		$("body").removeClass('skin-yellow');
		$("body").removeClass('skin-green');
		$("body").removeClass('skin-purple');
		$("body").removeClass('skin-blue');
		$("body").removeClass('skin-black');
	}
	function opentheme() {
	    document.getElementById("theme").style.width = "100%";
	}

	function closetheme() {
	    document.getElementById("theme").style.width = "0%";
	}

	