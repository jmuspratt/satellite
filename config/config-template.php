<?php
$config = array(
	
	
	// -------------------- Required Info --------------------

	// Give your gallery a title. Internal Double quotation marks ("") should be escaped as \" or replaced by HTML entities. See http://danshort.com/HTMLentities/
	// Example: "Joe&#8217;s \"Quality\" Photographs".
	"gallery_title" => "",

	// Insert your API key, copied from http://www.flickr.com/services/apps/create/apply (choose non-commercial)
	"key" => "",

	// Insert your Flickr username. This is not your Yahoo sign in username, or your Flickr screename - but the username you use for Flickr itself. To double check, sign in to Flickr and look at the top of the page where it says 'Signed in as...'. that is your username.
	// Example: "joeschmoe"
	"username"=> "",
		
	// Web address where Satellite is installed
	// Example: "http://mydomain.com/photos/"
	"root_url" => "",
	

	// -------------------- Optional Customizations --------------------

	// Custom background and link colors.
	// Ue any valid CSS color expression
	// Example 1: "#eaeaea"
	// Example 2: "rgba(0,0,0,.05)"
	
	"background" => "",
	"links" => "",

	// -------------------- Thumbnail Pages --------------------
	
	// On thumbnail views, how many photos per page? No quotation marks around numbers.
	// Example: 24
	"photos_per_page" => 24,
	
	
	// -------------------- Single Image/Video Page --------------------
	
	// Show photo taken and upload dates? No quotation marks around booleans.
	// Example: true
	"show_date_taken" => true,
	"show_date_uploaded" => false
	
	);

?>
