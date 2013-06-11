<?php
function check_root_url($url) {
	
	$last_char = substr($url, -1);
	
	if ( $last_char == "/" ) {
		return ( $url );
	}
	else {
		return ($url . "/" );
	}


}

?>