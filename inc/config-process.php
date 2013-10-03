<?php
$root_url = check_root_url($config["root_url"]);

$user_web_segment = $config["username"];

if ($config["flickr_web_address"] != "") {
	$user_web_segment = $config["flickr_web_address"];
	}


?>