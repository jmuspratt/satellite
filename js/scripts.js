$(document).ready(function(){		
	
	// Get screensize ------------------
	var screen_size = window.getComputedStyle(document.body,':after').getPropertyValue('content');

	// Get screen mode cookie and apply ------------------
	var mode_state = $.cookie("mode");
	
	if (mode_state == "on") {
		mode_on();
	}
		
	

	// Wide screen trigger ------------------
	$("p.mode-trigger a").click(function(event){
		mode_toggle();
		// defeat link
		event.preventDefault();
	});
	


	// Video ------------------
	// apply height:auto; to all agents except iPad
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
	if (!isiPad) {
		$("video").css("height", "auto");
		}
	
	
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


		// Viewing Mode: V key (for view) is 86 
		if ( e.keyCode == 86  && !(e.metaKey) ) { 
			mode_toggle();
			event.preventDefault();
		}
		
		// Play/Pause: P key is 87 
		if ( (e.keyCode == 80) && (single_view) ) { 
			
			var player = $("video").get(0);
			
			if (player.paused) {player.play();}
			else {player.pause();}
						
			e.preventDefault();
		}
		
			
}); // document.keydown



function mode_toggle() {
	var mode_trigger = $("p.mode-trigger a");
	
	$("aside.sidebar").toggleClass("compact");
	
	// toggle button class
	mode_trigger.toggleClass("active");
	
	$("body").toggleClass('mode');
	
	// toggle the cookie
	if ($.cookie("mode") == "on")
		$.cookie("mode", "off");
	else
		$.cookie("mode", "on");
}



// wish I could avoid doing this, but for page load it seems necessary
function mode_on() {
	var mode_trigger = $("p.mode-trigger a");
	mode_trigger.addClass("active");
	$("aside.sidebar").addClass("compact");
	mode_trigger.addClass("active");
	$("body").toggleClass('mode');
	$.cookie("mode", "on");

	}
