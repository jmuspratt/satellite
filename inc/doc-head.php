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
		


</head>