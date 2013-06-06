$(document).ready(function(){		
	
	// Get screensize ------------------
	var screen_size = window.getComputedStyle(document.body,':after').getPropertyValue('content');

	// Get wide screen cookie and apply ------------------
	var widescreen_state = $.cookie("widescreen");
	
	if (widescreen_state == "on") {
		widescreen_toggle();
	}
		
	

	// Wide screen trigger ------------------
	$("p.wide-trigger a").click(function(event){
		widescreen_toggle();
 	
		// toggle the cookie
		if ($.cookie("widescreen") == "on")
			$.cookie("widescreen", "off");
		else
			$.cookie("widescreen", "on");
		// defeat link
		event.preventDefault();
	});
	

	
	
}); // document.ready


// Keyboard Navigation ------------------

$(document).keydown(function(e){
	console.log(e.keyCode);

		// Left Arrow key is 37
		if (e.keyCode == 37) { 
			// alert("right");
			window.location.href = $(".photo-prev-next li.next a").attr("href");
			event.preventDefault();
		}

		// Right arrow key is 39
		if (e.keyCode == 39) { 
			window.location.href = $(".photo-prev-next li.prev a").attr("href");
	 	 	event.preventDefault();
		}

			
}); // document.keydown



function widescreen_toggle() {
	var wide_trigger = $("p.wide-trigger a");
	
	
	$("aside.sidebar").toggle();
	
	wide_trigger.toggleClass("active");
	
	if (wide_trigger.text() == "Wide Format")
			wide_trigger.text("Normal Format")
	else
			wide_trigger.text("Wide Format");
	$("body").toggleClass('wide');
}