<!doctype html>
	<head>
		<title>
			<?php echo $config["gallery_title"]; ?>
			<?php if ($photoInfo['photo']['title']) {echo " - " . $photoInfo['photo']['title'];} ?>
			<?php if ($this_page == "sets") {echo " - Sets";} ?>
		</title>

	<meta charset="utf-8">
	<meta name="robots" content="all">
	<meta name="author" content="<?php echo $config['username'];?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link href="<?php echo $config[root_url];?>/css/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $config[root_url];?>/css/type.css" rel="stylesheet" type="text/css">
	
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="#" />
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="/js/respond.min.js"></script>
	<![endif]-->
		
		<!-- jQuery  -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src='<?php echo $config["root_url"]; ?>/js/jquery-1.10.1.min.js'>\x3C/script>")</script>
		<!-- scripts -->
		<script src="<?php echo $config["root_url"]; ?>/js/respond.min.js"></script>
		<script src="<?php echo $config["root_url"]; ?>/js/jquery.cookie.js"></script>
		<script src="<?php echo $config["root_url"]; ?>/js/scripts.js"></script>

</head>