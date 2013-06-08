$(document).ready(function(){		
	
	// Get screensize ------------------
	var screen_size = window.getComputedStyle(document.body,':after').getPropertyValue('content');

	// Get wide screen cookie and apply ------------------
	var widescreen_state = $.cookie("widescreen");
	
	if (widescreen_state == "on") {
		widescreen_on();
	}
		
	

	// Wide screen trigger ------------------
	$("p.wide-trigger a").click(function(event){
		widescreen_toggle();
		// defeat link
		event.preventDefault();
	});
	

	
	
}); // document.ready


// Keyboard Navigation ------------------

$(document).keydown(function(e){
	
		var newer_url =  $("li.newer a").attr("href");
		var older_url =  $("li.older a").attr("href");
		var	single_view = $("body").hasClass("view");
		
		
		// Newer: Left Arrow key is 37
		if ( (e.keyCode == 37) && (typeof newer_url != 'undefined') ) { 
			// alert("right");
			window.location.href = newer_url;
			event.preventDefault();
		}

		// Older: Right arrow key is 39
		if ( (e.keyCode == 39) && (typeof older_url != 'undefined') ) {  
			window.location.href = older_url;
	 	 	event.preventDefault();
		}


		// WIDE: W key (for widescreen) is 87 
		if ( (e.keyCode == 87) && (single_view) ) { 
			widescreen_toggle();
			event.preventDefault();
		}
		
			
}); // document.keydown



function widescreen_toggle() {
	var wide_trigger = $("p.wide-trigger a");
	
	
	$("aside.sidebar").toggleClass("compact");
	
	// toggle button class
	wide_trigger.toggleClass("active");
	
	// toggle the button text
	if (wide_trigger.text() == "Wide Format")
			wide_trigger.text("Normal Format")
	else
			wide_trigger.text("Wide Format");

	// toggle body class
	$("body").toggleClass('wide');
	
	// toggle the cookie
	if ($.cookie("widescreen") == "on")
		$.cookie("widescreen", "off");
	else
		$.cookie("widescreen", "on");
}



// wish I could avoid doing this, but for page load it seems necessary
function widescreen_on() {
	var wide_trigger = $("p.wide-trigger a");
	$("aside.sidebar").addClass("compact");
	wide_trigger.addClass("active");
	$("body").toggleClass('wide');
	$.cookie("widescreen", "on");

	}
