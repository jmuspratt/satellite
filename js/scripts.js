$(document).ready(function(){		
	
	
	var size = window.getComputedStyle(document.body,':after').getPropertyValue('content');



	$("p.full-trigger a").click(function(event){
		var trigger = $(this);
		$(trigger).toggleClass("active");
		if ($(this).text() == "Full screen")
			$(this).text("Unfull")
		else
			$(this).text("Full screen");
		$("aside.sidebar").toggle();
		$("body").toggleClass('full');
		$("section.item").toggleClass('wide');

event.preventDefault();
 	
 	});
	
}); // document.ready