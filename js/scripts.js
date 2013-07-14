// $(document).ready(function(){		
	$(document).on('ready pjax:success', function() {
	
	// Get screensize ------------------
	var screen_size = window.getComputedStyle(document.body,':after').getPropertyValue('content');

	// Get screen mode cookie and apply ------------------
	var mode_state = $.cookie("mode");
		
	if (mode_state == "on") {
		mode_on();
	}
		

	// Pjax ------------------
	$.pjax.defaults.timeout = false;
	
	$(document).pjax('a.pjax', '#pjax-content');
	
	$(document).on('pjax:start', function() {
		$('#pjax-content').fadeOut(600);
	});

	$(document).on('pjax:end', function() {
		picturefill();
	});

	$(document).on('pjax:success', function() {
		$('#pjax-content').fadeIn(600);
	});



	// Wide screen trigger ------------------
	$("p.mode-trigger a").click(function(event){
		$("body").addClass("transition");
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
			e.preventDefault();
		}

		// Older: Right arrow key is 39
		if ( (e.keyCode == 39) && (typeof older_url != 'undefined') ) {  
			window.location.href = older_url;
			e.preventDefault();
		}


		// Viewing Mode: V key (for view) is 86 
		if ( e.keyCode == 86  && !(e.metaKey) ) { 
			$("body").addClass("transition");
			mode_toggle();
			e.preventDefault();
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
	
	// toggle button class
	$("p.mode-trigger a").toggleClass("active");
	
	// toggle body class
	$("body").toggleClass('mode');
	
	// toggle the cookie
	if ($.cookie("mode") == "on") {
		$.cookie("mode", null,{ path: '/' });
		}
	else {
		$.cookie("mode", "on",{ path: '/' });
	}
}



// wish I could avoid doing this, but for page load it seems necessary
function mode_on() {
	$("p.mode-trigger a").addClass("active");
	$("body").addClass('mode');
	}
